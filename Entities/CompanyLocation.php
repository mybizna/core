<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class CompanyLocation extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_company_location";

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'company_id', 'name', 'address_1', 'address_2', 'city', 'state',
        'zip', 'country', 'fax', 'phone',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['name'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
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

    /**
     * Function for defining list of fields in form view.
     *
     * @return FormBuilder
     */
    public function formBuilder(): FormBuilder
    {
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

    /**
     * Function for defining list of fields in filter view.
     *
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/6');
        $fields->name('city')->type('text')->group('w-1/6');
        $fields->name('state')->type('text')->group('w-1/6');
        $fields->name('country')->type('text')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table): void
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
