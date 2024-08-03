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
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'code', 'code3', 'latitude', 'longitude', 'is_system'];

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
