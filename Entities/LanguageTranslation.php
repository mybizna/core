<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

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


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('slug')->type('text')->ordering(true);
        $fields->name('language_id')->type('text')->ordering(true);
        $fields->name('phrase')->type('text')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('slug')->type('text')->group('w-1/2');
        $fields->name('language_id')->type('text')->group('w-1/2');
        $fields->name('phrase')->type('text')->group('w-1/2');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('slug')->type('text')->group('w-1/6');
        $fields->name('language_id')->type('text')->group('w-1/6');
        $fields->name('phrase')->type('text')->group('w-1/6');

        return $fields;

    }
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
        Migration::addForeign($table, 'core_language', 'language_id');
    }
}
