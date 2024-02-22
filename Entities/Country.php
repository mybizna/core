<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Country extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_country";

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
    protected $fillable = ['name', 'code', 'code3', 'latitude', 'longitude', 'is_system'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['name', 'code'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('name')->html('text');
        $this->fields->string('code', 2)->html('text');
        $this->fields->string('code3', 3)->nullable()->default(null)->html('text');
        $this->fields->string('latitude', 255)->nullable()->default(null)->html('text');
        $this->fields->string('longitude', 255)->nullable()->default(null)->html('text');
        $this->fields->tinyInteger('is_system')->nullable()->default(0)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['name', 'code', 'code3', 'latitude', 'longitude', 'is_system'];
        $structure['form'] = [
            ['label' => 'Name', 'class' => 'col-span-full', 'fields' => ['name']],
            ['label' => 'Code', 'class' => 'col-span-full md:col-span-6', 'fields' => ['code', 'code3']],
            ['label' => 'Geo-Code', 'class' => 'col-span-full md:col-span-6', 'fields' => ['latitude', 'longitude']],
            ['label' => 'Setting', 'class' => 'col-span-full md:col-span-6', 'fields' => ['is_system']],
        ];
        $structure['filter'] = ['name', 'code', 'code3'];

        return $structure;
    }

    /**
     * Function for deleting a record.
     *
     * @param int $id
     *
     * @return void
     */
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

        return parent::deleteRecord($id);

    }
}
