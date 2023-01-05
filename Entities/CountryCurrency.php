<?php

namespace Modules\Core\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class CountryCurrency extends BaseModel
{

    protected $table = "core_country_currency";

    public $migrationDependancy = [];

    protected $fillable = ['currency_code', 'country_code', 'country_code3'];


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
        $table->string('currency_code', 3);
        $table->string('country_code', 2);
        $table->string('country_code3', 3);
    }
}
