<?php

namespace EEV\Leads\Classes;

use Illuminate\Support\Facades\Lang;

class LeadStatus
{
    const NEW = 'new';
    const COMPLETE = 'complete';

    public static function getOptions() {
        return [
            self::NEW => Lang::get('eev.leads::lang.statuses.' . self::NEW),
            self::COMPLETE => Lang::get('eev.leads::lang.statuses.' . self::COMPLETE),
        ];
    }
}