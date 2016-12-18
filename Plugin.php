<?php namespace Zoomyboy\Jssor;

use Backend;
use System\Classes\PluginBase;

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
			'Zoomyboy\Jssor\Widgets\Arrow' => 'arrow'
		];
	}

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

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

}
