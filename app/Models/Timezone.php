<?php

namespace Modules\Core\Models;

use Modules\Base\Models\BaseModel;
use Modules\Core\Models\Country;

class Timezone extends BaseModel
{

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ["name", "country_id", "is_system"];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'core_timezone';

    /**
     * Add relationship to Country
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
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

        $timezone = $this->where('id', $id)->first();

        if ($timezone->is_system) {
            return [
                'module' => $this->module,
                'model' => $this->model,
                'status' => 0,
                'error' => 1,
                'record' => [],
                'message' => 'You can not Delete a Timezone Set by system..',
            ];
        }

        return parent::deleteRecord($id);

    }

}
