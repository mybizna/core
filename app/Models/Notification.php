<?php

namespace Modules\Core\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Notification extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_notification";

    /**
     * List of tables names that are need in this model.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['slug', 'short', 'medium', 'lengthy', 'enable_short',
        'enable_medium', 'enable_lengthy', 'published'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function migration(Blueprint $table): void
    {

        $table->string('slug');
        $table->string('short');
        $table->string('medium');
        $table->text('lengthy');
        $table->tinyInteger('enable_short')->nullable()->default(1);
        $table->tinyInteger('enable_medium')->nullable()->default(0);
        $table->tinyInteger('enable_lengthy')->nullable()->default(1);
        $table->tinyInteger('published')->nullable()->default(1);

    }
}
