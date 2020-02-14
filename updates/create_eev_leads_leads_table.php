<?php namespace EEV\Leads\Updates;

use EEV\Leads\Classes\LeadStatus;
use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateEevLeadsLeads extends Migration
{
    public function up()
    {
        Schema::create('eev_leads_leads', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 4096)->nullable();
            $table->json('data')->nullable();
            $table->string('status', 16)->default(LeadStatus::NEW);
            $table->string('note', 4096)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('eev_leads_leads');
    }
}
