<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

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
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['currency_code', 'country_code'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Handle post migration processes for adding foreign keys.
     *
     * @param Blueprint $table
     *
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->increments('id')->html('hidden');
        $this->fields->string('currency_code', 3)->html('text');
        $this->fields->string('country_code', 2)->html('text');
        $this->fields->string('country_code3', 3)->html('text');
    }


    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {

    }
}
