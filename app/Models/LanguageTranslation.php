<?php

namespace Modules\Core\Models;

use Modules\Base\Models\BaseModel;
use Modules\Core\Models\Language;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LanguageTranslation extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_language_translation";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['slug', 'language_id', 'phrase'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Add relationship to Language
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->string('slug')->nullable();
       $table->unsignedBigInteger('language_id')->nullable();
        $table->string('phrase')->nullable();

    }

    public function post_migration(Blueprint $table): void
    {
        $table->foreign('language_id')->references('id')->on('core_language')->onDelete('set null');
    }

}
