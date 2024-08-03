<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

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

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->increments('id')->html('hidden');
        $this->fields->string('module')->html('text');
        $this->fields->string('model')->html('text');
        $this->fields->string('name')->html('text');
        $this->fields->string('type')->html('text');
        $this->fields->string('value')->html('text');
    }



}
