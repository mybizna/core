<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class State extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_state";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'country_code', 'type', 'item_id', 'state_code', 'latitude', 'longitude', 'is_system'];

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
     *
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('name')->html('text');
        $this->fields->string('country_code', 2)->html('text');
        $this->fields->string('type', 50)->nullable()->html('text');
        $this->fields->integer('item_id')->nullable()->html('text');
        $this->fields->string('state_code', 5)->nullable()->default(null)->html('text');
        $this->fields->string('latitude', 255)->nullable()->default(null)->html('text');
        $this->fields->string('longitude', 255)->nullable()->default(null)->html('text');
        $this->fields->boolean('is_system')->default(true)->html('switch');
    }


    /**
     * Function for deleting a record.
     *
     * @param int $id
     *
     * @return array
     */
    public function deleteRecord($id)
    {

        $state = $this->where('id', $id)->first();

        if ($state->is_system) {
            return [
                'module' => $this->module,
                'model' => $this->model,
                'status' => 0,
                'error' => 1,
                'record' => [],
                'message' => 'You can not Delete a State Set by system..',
            ];
        }

        return parent::deleteRecord($id);

    }


}
