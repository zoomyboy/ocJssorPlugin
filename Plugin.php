<?php namespace Zoomyboy\Jssor;

use Backend;
use Backend\Controllers\Auth;
use Backend\Facades\BackendAuth;
use Intervention\Image\ImageManagerStatic as Image;
use RainLab\Pages\Controllers\Index;
use Symfony\Component\HttpFoundation\File\File;
use System\Classes\PluginBase;
use Zoomyboy\Jssor\Console\Generate;
use Zoomyboy\Jssor\Models\Jssor;

/**
 * jssor Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'jssor',
            'description' => 'Displays a jssor Slider',
            'author'      => 'zoomyboy',
            'icon'        => 'icon-file-image-o'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

	public function registerFormWidgets() {
		return [
			'Zoomyboy\Jssor\Widgets\Arrow' => 'arrow',
			'Zoomyboy\Jssor\Widgets\Bullet' => 'bullet'
		];
	}

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        $this->registerConsoleCommand('jssor:generate', Generate::class);

        \System\Models\File::extend(function($file) {
            $file->addDynamicMethod('generateSizes', function($sizes, $dir) use ($file) {
                $originalSize = getimagesize(\Storage::disk('local')->path($file->getDiskPath()));

                $sizes = collect($sizes)->filter(function($size) use ($originalSize) {
                    return $size <= $originalSize[0];
                })->each(function($size) use ($file, $dir) {
                    $originalImageLocation = \Storage::disk('local')->path($file->getDiskPath());

                    $image = Image::make($originalImageLocation)
                        ->resize($size, null, function($c) {
                            $c->aspectRatio();
                        })
                    ;

                    $filename = str_slug(
                        $file->title ?: pathinfo($file->getFilename(), PATHINFO_FILENAME)
                    );

                    if (!\Storage::disk('local')->exists('uploads/public/jssor/'.$dir)) {
                        \Storage::disk('local')->makeDirectory('uploads/public/jssor/'.$dir);
                    }

                    $location = 'uploads/public/jssor/'.$dir.'/'.$filename.'-'.$image->width().'x'.$image->height().'.'.$file->getExtension();

                    $rootPath = \Storage::disk('local')->path($location);
                    $image->save($rootPath);
                });

                return count($sizes);
            });

            $file->addDynamicMethod('responsive', function($dir) use ($file) {
                $filename = str_slug(
                    $file->title ?: pathinfo($file->getFilename(), PATHINFO_FILENAME)
                );

                $location = 'uploads/public/jssor/'.$dir;

                $sizes = collect(\Storage::files($location))
                    ->filter(function($fileVersion) use ($filename) {
                        return str_contains($fileVersion, $filename);
                    })
                    ->values()
                    ->map(function($fileVersion) {
                        $sizes = getimagesize(\Storage::path($fileVersion));

                        return [\Storage::url('app/'.$fileVersion), $sizes[0]];
                    })
                ;

                if ($sizes->isEmpty()) {
                    return '<img src="'.$file->path.'">';
                }

                $srcset = 'srcset="';
                $s = '';

                foreach($sizes as $size) {
                    $srcset .= $size[0].' '.$size[1].'w, ';
                    $s .= '(max-width: '.$size[1].'px) 100vw, ';
                }

                $srcset = substr($srcset, 0, -2).'"';
                $s = 'sizes="'.substr($s, 0, -2).', 1920px"';

                return '<img '.$srcset.' '.$s.' src="'.$sizes[0][0].'" alt="'.$file->title.'">';
            });
        });

        \Event::listen('backend.form.extendFields', function($widget) {
            if(!is_a($widget->getController(), Index::class)) {
                return;
            }

            $options = Jssor::get()->pluck('title', 'id');

            $widget->addTabFields([
                'viewBag[jssor]' => [
                    'tab' => 'cms::lang.editor.settings',
                    'span' => 'left',
                    'label' => 'Jssor',
                    'type' => 'dropdown',
                    'emptyOption' => 'Kein',
                    'options' => $options,
                    'comment' => 'Select your jssor'
                ]
            ]);
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Zoomyboy\Jssor\Components\Single' => 'jssor_single',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'zoomyboy.jssor.some_permission' => [
                'tab' => 'jssor',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'jssor' => [
                'label'       => 'jssor',
                'url'         => Backend::url('zoomyboy/jssor/jssor'),
                'icon'        => 'icon-file-image-o',
                'permissions' => ['zoomyboy.jssor.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerSchedule($schedule) {
        $schedule->command('jssor:generate')->dailyAt('01:00');
    }
}
