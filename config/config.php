<?php

use EEV\Leads\Classes\LeadStatus;
use Illuminate\Support\Facades\Lang;

return [
    'fields' => [
        'none' => [
            'label' => Lang::get('eev.leads::lang.none'),
        ],
        'name' => [
            'label' => Lang::get('eev.leads::lang.name'),
        ],
        'phone' => [
            'label' => Lang::get('eev.leads::lang.phone'),
        ],
        'email' => [
            'label' => Lang::get('eev.leads::lang.email'),
        ],
    ],
    'item_title' => '',
    'default_status' => LeadStatus::NEW,
];