<?php

namespace EEV\Leads\Classes;

use EEV\Forms\Classes\Handlers\FormHandler;
use EEV\Leads\Models\Lead;
use Illuminate\Support\Facades\Config;

class LeadFormHandler implements FormHandler
{
    protected $config;

    public function __construct($config = [])
    {
        $this->config = $config;
    }

    public function handle($data)
    {

        if (empty($this->config['map'])) {
            return;
        }

        $pluginFields = Config::get('eev.leads::fields');

        $lead = new Lead();
        $leadData = [];

        foreach ($data as $key => $value) {
            if (isset($this->config['map'][$key]) && isset($pluginFields[$this->config['map'][$key]])) {

                if (is_array($value)) {
                    $formValue = join(', ', $value);
                } else {
                    $formValue = $value;
                }

                $leadData[] = [
                    'type' => $this->config['map'][$key],
                    'value' => $formValue,
                ];
            }
        }

        $lead->data = $leadData;
        $lead->save();

    }
}