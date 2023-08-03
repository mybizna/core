<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Notification extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_notification";

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
    protected $fillable = ['slug', 'short', 'medium', 'lengthy', 'enable_short',
        'enable_medium', 'enable_lengthy', 'published'];

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

        $fields->name('slug')->type('text')->ordering(true);
        $fields->name('short')->type('text')->ordering(true);
        $fields->name('medium')->type('textarea')->ordering(true);
        $fields->name('lengthy')->type('textarea')->ordering(true);
        $fields->name('enable_short')->type('switch')->ordering(true);
        $fields->name('enable_medium')->type('switch')->ordering(true);
        $fields->name('enable_lengthy')->type('switch')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);

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

        $fields->name('slug')->type('text')->group('w-1/2');
        $fields->name('short')->type('text')->group('w-1/2');
        $fields->name('medium')->type('textarea')->group('w-1/2');
        $fields->name('lengthy')->type('textarea')->group('w-1/2');
        $fields->name('enable_short')->type('switch')->group('w-1/2');
        $fields->name('enable_medium')->type('switch')->group('w-1/2');
        $fields->name('enable_lengthy')->type('switch')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');

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

        $fields->name('slug')->type('text')->group('w-1/6');
        $fields->name('enable_short')->type('switch')->group('w-1/6');
        $fields->name('enable_medium')->type('switch')->group('w-1/6');
        $fields->name('enable_lengthy')->type('switch')->group('w-1/6');
        $fields->name('published')->type('switch')->group('w-1/6');

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
        $table->string('slug');
        $table->string('short');
        $table->string('medium');
        $table->text('lengthy');
        $table->tinyInteger('enable_short')->nullable()->default(1);
        $table->tinyInteger('enable_medium')->nullable()->default(0);
        $table->tinyInteger('enable_lengthy')->nullable()->default(1);
        $table->tinyInteger('published')->nullable()->default(1);
    }
}
