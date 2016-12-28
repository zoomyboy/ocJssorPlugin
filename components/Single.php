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

	public function onRender() {
		$model= $this->model();

		$this->height = ($model->use_height_from_component) ? $this->property('height') : $model->height;
		$this->pause = ($model->use_pause_from_component) ? $this->property('pause') : $model->pause;

		$this->addJs('assets/js/jssor.min.js');
		if ($model->hasArrow()) {
			$this->addCss('assets/css/arrows/'.$model->arrow->filename.'.css');
		}
		if ($model->hasBullet()) {
			$this->addCss('assets/css/bullets/'.$model->bullet->filename.'.css');
		}
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
