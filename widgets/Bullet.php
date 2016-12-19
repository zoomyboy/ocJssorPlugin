<?php

namespace Zoomyboy\Jssor\Widgets;
use Backend\Classes\FormWidgetBase;
use Zoomyboy\Jssor\Models\Bullet as BulletModel;

class Bullet extends FormWidgetBase {
	protected $defaultAlias = 'bullet';

	public function render() {
		$this->vars['bullets'] = BulletModel::get();
		$this->vars['name'] = $this->formField->getName();
		$this->vars['value'] = $this->getLoadValue();
		return $this->makePartial('field');
	}
}

