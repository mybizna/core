<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Setting extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_setting";

    /**
     * List of tables names that are need in this model.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['module', 'model', 'name', 'type', 'value'];

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

        $fields->name('module')->type('text')->ordering(true);
        $fields->name('model')->type('text')->ordering(true);
        $fields->name('name')->type('text')->ordering(true);
        $fields->name('type')->type('text')->ordering(true);
        $fields->name('value')->type('text')->ordering(true);

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

        $fields->name('module')->type('text')->group('w-1/2');
        $fields->name('model')->type('text')->group('w-1/2');
        $fields->name('name')->type('text')->group('w-1/2');
        $fields->name('type')->type('text')->group('w-1/2');
        $fields->name('value')->type('text')->group('w-1/2');

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

        $fields->name('module')->type('text')->group('w-1/6');
        $fields->name('model')->type('text')->group('w-1/6');
        $fields->name('name')->type('text')->group('w-1/6');
        $fields->name('type')->type('text')->group('w-1/6');
        $fields->name('value')->type('text')->group('w-1/6');

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
        $table->string('module');
        $table->string('model');
        $table->string('name');
        $table->string('type');
        $table->string('value');
    }
}
