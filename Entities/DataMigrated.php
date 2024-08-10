<?php

namespace Modules\Core\Entities;

use Modules\Base\Entities\BaseModel;

class DataMigrated extends BaseModel
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
    protected $fillable = [
        'module',
        'table_name',
        'array_key',
        'item_id',
        'counter',
        'hash',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'core_data_migrated';

}
