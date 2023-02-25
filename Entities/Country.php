<?php

namespace Modules\Core\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Country extends BaseModel
{

    protected $table = "core_country";

    public $migrationDependancy = [];

    protected $fillable = ['name', 'code', 'code3', 'latitude', 'longitude','is_system'];


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
        $table->string('code', 2);
        $table->string('code3', 3)->nullable()->default(null);
        $table->string('latitude', 255)->nullable()->default(null);
        $table->string('longitude', 255)->nullable()->default(null);
        $table->tinyInteger('is_system')->default(false);
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
