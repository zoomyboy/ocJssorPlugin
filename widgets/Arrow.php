<?php

namespace Zoomyboy\Jssor\Widgets;
use Backend\Classes\FormWidgetBase;
use Zoomyboy\Jssor\Models\Arrow as ArrowModel;

class Arrow extends FormWidgetBase {
	protected $defaultAlias = 'arrow';

	public function render() {
		$this->vars['arrows'] = ArrowModel::get();
		$this->vars['name'] = $this->formField->getName();
		$this->vars['value'] = $this->getLoadValue();
		return $this->makePartial('field');
	}
}

