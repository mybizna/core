<?php

namespace Modules\Core\Models;

use Modules\Base\Models\BaseModel;

class Company extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_company";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'name', 'address_1', 'address_2', 'city', 'state',
        'zip', 'country', 'fax', 'phone',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
