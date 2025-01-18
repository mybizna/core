<?php

namespace Modules\Core\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

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

    public function migration(Blueprint $table): void
    {

        $table->string('module', 255);
        $table->string('table_name', 255);
        $table->string('array_key', 255);
        $table->string('hash', 255);
        $table->integer('item_id')->nullable()->default(null);
        $table->integer('counter')->nullable()->default(0);

    }

}
