<?php namespace Zoomyboy\Jssor\Components;

use Cms\Classes\ComponentBase;
use Zoomyboy\Jssor\Models\Jssor as JssorModel;

class Single extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Single Jssor Slider',
            'description' => 'Displays a single jssor'
        ];
    }

	public function onRun() {
		$this->addJs('components/single/assets/js/jssor.min.js');
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
				'type' => 'dropdown'
			]
		];
    }

	public function getGalleryOptions() {
		return JssorModel::get()->pluck('title', 'id')->toArray();
	}
}