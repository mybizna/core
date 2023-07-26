<?php

namespace Modules\Core\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

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

    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('currency_code')->type('text')->ordering(true);
        $fields->name('country_code')->type('text')->ordering(true);
        $fields->name('country_code3')->type('text')->ordering(true);


        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('currency_code')->type('text')->group('w-1/2');
        $fields->name('country_code')->type('text')->group('w-1/2');
        $fields->name('country_code3')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('currency_code')->type('text')->group('w-1/6');
        $fields->name('country_code')->type('text')->group('w-1/6');
        $fields->name('country_code3')->type('text')->group('w-1/6');

        return $fields;

    }
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
