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
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['slug'];

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

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['slug', 'enable_short', 'enable_medium', 'enable_lengthy', 'published'];
        $structure['form'] = [
            ['label' => 'Short', 'class' => 'col-span-full', 'fields' => ['short']],
            ['label' => 'Medium', 'class' => 'col-span-full md:col-span-6', 'fields' => ['medium']],
            ['label' => 'Setting', 'class' => 'col-span-full md:col-span-6', 'fields' => ['enable_short', 'enable_medium', 'enable_lengthy', 'published']],
            ['label' => 'Lengthy', 'class' => 'col-span-full', 'fields' => ['lengthy']],
        ];
        $structure['filter'] = ['slug', 'enable_short', 'enable_medium', 'enable_lengthy', 'published'];

        return $structure;
    }

}
