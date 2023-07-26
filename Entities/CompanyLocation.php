<?php

namespace Modules\Core\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class CompanyLocation extends BaseModel
{

    protected $table = "core_company_location";

    public $migrationDependancy = [];

    protected $fillable = [
        'company_id', 'name', 'address_1', 'address_2', 'city', 'state',
        'zip', 'country', 'fax', 'phone'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('company_id')->type('recordpicker')->table('core_company')->ordering(true);
        $fields->name('name')->type('text')->ordering(true);
        $fields->name('address_1')->type('text')->ordering(true);
        $fields->name('address_2')->type('text')->ordering(true);
        $fields->name('city')->type('text')->ordering(true);
        $fields->name('state')->type('text')->ordering(true);
        $fields->name('zip')->type('text')->ordering(true);
        $fields->name('country')->type('text')->ordering(true);
        $fields->name('fax')->type('text')->ordering(true);
        $fields->name('phone')->type('text')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('company_id')->type('recordpicker')->table('core_company')->group('w-1/2');
        $fields->name('name')->type('text')->group('w-1/2');
        $fields->name('address_1')->type('text')->group('w-1/2');
        $fields->name('address_2')->type('text')->group('w-1/2');
        $fields->name('city')->type('text')->group('w-1/2');
        $fields->name('state')->type('text')->group('w-1/2');
        $fields->name('zip')->type('text')->group('w-1/2');
        $fields->name('country')->type('text')->group('w-1/2');
        $fields->name('fax')->type('text')->group('w-1/2');
        $fields->name('phone')->type('text')->group('w-1/2');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/6');
        $fields->name('city')->type('text')->group('w-1/6');
        $fields->name('state')->type('text')->group('w-1/6');
        $fields->name('country')->type('text')->group('w-1/6');

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
        $table->unsignedInteger('company_id')->nullable()->index('company_id');
        $table->string('name')->nullable();
        $table->string('address_1')->nullable();
        $table->string('address_2')->nullable();
        $table->string('city', 100)->nullable();
        $table->string('state', 100)->nullable();
        $table->integer('zip')->nullable();
        $table->string('country', 5)->nullable();
        $table->string('fax', 20)->nullable();
        $table->string('phone', 20)->nullable();
    }
}
