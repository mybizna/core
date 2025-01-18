<?php
namespace Modules\Core\Models;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Models\BaseModel;

class Language extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_language";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'slug'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function migration(Blueprint $table): void
    {

        $table->string('name')->nullable();
        $table->string('slug')->nullable();

    }
}
