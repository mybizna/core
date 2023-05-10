<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class LanguageTranslation extends BaseModel
{

    protected $table = "core_language_translation";

    public $migrationDependancy = [];

    protected $fillable = ['slug', 'language_id', 'phrase'];

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
        $table->integer('language_id');
        $table->string('phrase');
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('core_language_translation', 'language_id')) {
            $table->foreign('language_id')->references('id')->on('core_language')->nullOnDelete();
        }
    }
}
