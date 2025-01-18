<?php

namespace Modules\Core\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Setting extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_setting";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['module', 'model', 'name', 'type', 'value'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function migration(Blueprint $table): void
    {

        $table->string('module');
        $table->string('model');
        $table->string('name');
        $table->string('type');
        $table->string('value');

    }
}
