<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Notification extends BaseModel
{

    protected $table = "core_notification";

    public $migrationDependancy = [];

    protected $fillable = ['slug', 'short', 'medium', 'long', 'enable_short',
        'enable_medium', 'enable_long', 'published'];

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
        $table->string('slug');
        $table->string('short');
        $table->string('medium');
        $table->string('long');
        $table->tinyInteger('enable_short')->default(true);
        $table->tinyInteger('enable_medium')->default(false);
        $table->tinyInteger('enable_long')->default(true);
        $table->tinyInteger('published')->default(true);
    }
}
