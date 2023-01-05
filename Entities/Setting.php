<?php

namespace Modules\Core\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Setting extends BaseModel
{

    protected $table = "core_setting";

    public $migrationDependancy = [];

    protected $fillable = ['module', 'model', 'name', 'type', 'value'];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('module');
        $table->string('model');
        $table->string('name');
        $table->string('type');
        $table->string('value');
    }
}
