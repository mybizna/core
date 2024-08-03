<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

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
        $this->fields->string('slug')->html('text');
        $this->fields->string('short')->html('text');
        $this->fields->string('medium')->html('textarea');
        $this->fields->text('lengthy')->html('textarea');
        $this->fields->tinyInteger('enable_short')->nullable()->default(1)->html('switch');
        $this->fields->tinyInteger('enable_medium')->nullable()->default(0)->html('switch');
        $this->fields->tinyInteger('enable_lengthy')->nullable()->default(1)->html('switch');
        $this->fields->tinyInteger('published')->nullable()->default(1)->html('switch');
    }

}
