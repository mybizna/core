<?php

namespace Modules\Core\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class CountryCurrency extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_country_currency";

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['currency_code', 'country_code', 'country_code3'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function migration(Blueprint $table): void
    {

        $table->string('currency_code', 3);
        $table->string('country_code', 2);
        $table->string('country_code3', 3);

    }
}
