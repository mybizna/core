<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class CountryCurrency extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_country_currency";

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
    protected $fillable = ['currency_code', 'country_code', 'country_code3'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['currency_code', 'country_code'];

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

        $fields->name('currency_code')->type('text')->ordering(true);
        $fields->name('country_code')->type('text')->ordering(true);
        $fields->name('country_code3')->type('text')->ordering(true);

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

        $fields->name('currency_code')->type('text')->group('w-1/2');
        $fields->name('country_code')->type('text')->group('w-1/2');
        $fields->name('country_code3')->type('text')->group('w-1/2');

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

        $fields->name('currency_code')->type('text')->group('w-1/6');
        $fields->name('country_code')->type('text')->group('w-1/6');
        $fields->name('country_code3')->type('text')->group('w-1/6');

        return $fields;

    }

    /**
     * Handle post migration processes for adding foreign keys.
     *
     * @param Blueprint $table
     *
     * @return void
     */
    public function migration(Blueprint $table): void
    {
        $table->increments('id');
        $table->string('currency_code', 3);
        $table->string('country_code', 2);
        $table->string('country_code3', 3);
    }
}
