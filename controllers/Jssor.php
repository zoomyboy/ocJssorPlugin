<?php namespace Zoomyboy\Jssor\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Jssor Back-end Controller
 */
class Jssor extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Zoomyboy.Jssor', 'jssor', 'jssor');
    }
}