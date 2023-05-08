<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class LanguageTranslation extends BaseModel
{

    protected $table = "core_language_translation";

    public $migrationDependancy = [];

    protected $fillable = ['slug', 'language', 'phrase'];

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
        $table->char('language', 2);
        $table->string('phrase');
    }
}
