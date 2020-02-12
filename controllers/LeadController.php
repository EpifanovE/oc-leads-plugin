<?php namespace EEV\Leads\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class LeadController extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'eev.leads.manage-leads' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('EEV.Leads', 'leads');
    }
}
