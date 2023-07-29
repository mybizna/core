<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Country extends BaseModel
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "core_country";

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = ['name', 'code', 'code3', 'latitude', 'longitude', 'is_system'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('name')->type('text')->ordering(true);
        $fields->name('code')->type('text')->ordering(true);
        $fields->name('code3')->type('text')->ordering(true);
        $fields->name('latitude')->type('text')->ordering(true);
        $fields->name('longitude')->type('text')->ordering(true);
        $fields->name('is_system')->type('switch')->ordering(true);

        return $fields;

    }

    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/2');
        $fields->name('code')->type('text')->group('w-1/2');
        $fields->name('code3')->type('text')->group('w-1/2');
        $fields->name('latitude')->type('text')->group('w-1/2');
        $fields->name('longitude')->type('text')->group('w-1/2');
        $fields->name('is_system')->type('switch')->group('w-1/2');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/6');
        $fields->name('code')->type('text')->group('w-1/6');
        $fields->name('code3')->type('text')->group('w-1/6');
        $fields->name('latitude')->type('text')->group('w-1/6');
        $fields->name('longitude')->type('text')->group('w-1/6');
        $fields->name('is_system')->type('switch')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('name');
        $table->string('code', 2);
        $table->string('code3', 3)->nullable()->default(null);
        $table->string('latitude', 255)->nullable()->default(null);
        $table->string('longitude', 255)->nullable()->default(null);
        $table->tinyInteger('is_system')->nullable()->default(0);
    }

    public function deleteRecord($id)
    {

        $country = $this->where('id', $id)->first();

        if ($country->is_system) {
            return [
                'module' => $this->module,
                'model' => $this->model,
                'status' => 0,
                'error' => 1,
                'record' => [],
                'message' => 'You can not Delete a Country Set by system.',
            ];
        }

        parent::deleteRecord($id);

    }
}
