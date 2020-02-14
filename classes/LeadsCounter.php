<?php

namespace EEV\Leads\Classes;

use EEV\Leads\Models\Lead;

class LeadsCounter
{
    public static function count() {
        return Lead::where('status', LeadStatus::NEW)->count();
    }
}