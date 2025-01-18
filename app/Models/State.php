<?php

namespace Modules\Core\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

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
     * Function for deleting a record.
     *
     * @param int $id
     *
     * @return array
     */
    public function deleteRecord($id): mixed
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

    public function migration(Blueprint $table): void
    {

        $table->string('name');
        $table->string('country_code', 2);
        $table->string('type', 50)->nullable();
        $table->integer('item_id')->nullable();
        $table->string('state_code', 5)->nullable()->default(null);
        $table->string('latitude', 255)->nullable()->default(null);
        $table->string('longitude', 255)->nullable()->default(null);
        $table->boolean('is_system')->default(true);
    }
}
