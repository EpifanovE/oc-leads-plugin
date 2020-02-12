<?php namespace EEV\Leads\Models;

use EEV\Leads\Classes\LeadStatus;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Model;
use October\Rain\Database\Traits\SoftDelete;
use October\Rain\Database\Traits\Validation;


class Lead extends Model
{
    use Validation, SoftDelete;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'data',
        'name',
    ];

    protected $jsonable = ['data',];

    public $table = 'eev_leads_leads';

    public $rules = [
    ];

    public function getDataTableOptions()
    {

        $items = Config::get('eev.leads::fields');

        $list = [];

        if ( ! empty($items)) {
            foreach ($items as $key => $value) {
                $list[$key] = $value['label'];
            }
        }

        return $list;
    }

    public function getStatusOptions()
    {
        return LeadStatus::getOptions();
    }

    public function getDefaultTitle()
    {
        return Lang::get('eev.leads::lang.lead_title') . ' ' . date("Y-m-d H:i");
    }

    public function beforeSave()
    {
        if (empty($this->name)) {
            $this->name = $this->getDefaultTitle();
        }
    }

    public function getDataForColumnAttribute()
    {
        if (empty($this->data)) {
            return '';
        }

        $items = [];
        foreach ($this->data as $item) {
            $items[] = $item['value'];
        }

        return mb_strimwidth(join(' ', $items), 0, 53, "...");
    }

    public function getStatusLabelAttribute()
    {
        return [
            'label' => Lang::get('eev.leads::lang.statuses.' . $this->status),
            'modifier' => $this->status,
        ];
    }

    public function getStatusFilterOptions() {
        return LeadStatus::getOptions();
    }

}
