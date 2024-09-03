<?php

namespace Modules\Core\Models;

use Modules\Base\Classes\Migration;
use Modules\Base\Models\BaseModel;

class Currency extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'core_currency';

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        "name", "code", "symbol", "rate", 'is_system',
        "buying", "selling", "published", "is_fetched",
    ];

    /**
     * Function for deleting a record.
     *
     * @param int $id
     *
     * @return array
     */
    public function deleteRecord($id)
    {

        $currency = $this->where('id', $id)->first();

        if ($currency->is_system) {
            return [
                'module' => $this->module,
                'model' => $this->model,
                'status' => 0,
                'error' => 1,
                'record' => [],
                'message' => 'You can not Delete a Currency Set by system..',
            ];
        }

        return parent::deleteRecord($id);

    }
}
