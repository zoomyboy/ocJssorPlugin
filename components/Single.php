<?php namespace Zoomyboy\Jssor\Components;

use Cms\Classes\ComponentBase;
use Zoomyboy\Jssor\Models\Jssor as JssorModel;

class Single extends ComponentBase
{
	public $height;
	public $pause;

    public function componentDetails()
    {
        return [
            'name'        => 'Single Jssor Slider',
            'description' => 'Displays a single jssor'
        ];
    }

    public function onRun() {
        $model = $this->model();

        $this->addCss('assets/css/jssor.css');
        $this->addJs('assets/js/jssor.js');
    }

	public function model() {
		return JssorModel::where('id', $this->property('gallery'))->first();
	}

    public function defineProperties()
    {
		return [
			'gallery' => [
				'title' => 'Galerie',
				'description' => 'Jssor-Gallery',
				'type' => 'dropdown',
				'placeholder' => 'Nothing'
			],
			'pause' => [
				'title' => 'Pause',
				'description' => 'Specify on which conditions the autoplay (if set) should pause',
				'type' => 'checkbox'
			],
			'height' => [
				'title' => 'Height',
				'description' => 'Specify height of the slider',
				'type' => 'string'
			]
		];
    }

	public function getGalleryOptions() {
		return JssorModel::get()->pluck('title', 'id')->toArray();
	}
}
