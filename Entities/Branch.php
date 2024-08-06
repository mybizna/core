<?php

namespace Modules\Core\Entities;

use Modules\Base\Entities\BaseModel;

class Branch extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_branch";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'company_id', 'name', 'address_1', 'address_2', 'city', 'state',
        'zip', 'country', 'fax', 'phone',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
