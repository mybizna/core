<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class State extends BaseModel
{

    protected $table = "core_state";

    public $migrationDependancy = [];

    protected $fillable = ['name', 'country_code', 'type', 'item_id', 'state_code', 'latitude', 'longitude', 'is_system'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('name');
        $table->string('country_code', 2);
        $table->string('type', 50)->nullable();
        $table->integer('item_id')->nullable();
        $table->string('state_code', 5)->nullable()->default(null);
        $table->string('latitude', 255)->nullable()->default(null);
        $table->string('longitude', 255)->nullable()->default(null);
        $table->boolean('is_system')->default(true);
    }

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

        parent::deleteRecord($id);

    }
}
