<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Company extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_company";

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
    protected $fillable = [
        'name', 'address_1', 'address_2', 'city', 'state',
        'zip', 'country', 'fax', 'phone',
    ];
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

        $this->fields->increments('id');
        $this->fields->string('name')->nullable()->html('text');
        $this->fields->string('address_1')->nullable()->html('text');
        $this->fields->string('address_2')->nullable()->html('text');
        $this->fields->string('city', 100)->nullable()->html('text');
        $this->fields->string('state', 100)->nullable()->html('text');
        $this->fields->integer('zip')->nullable()->html('text');
        $this->fields->unsignedInteger('country_id')->nullable()->index('country_id')->html('recordpicker')->relation(['core', 'country']);
        $this->fields->string('fax', 20)->nullable()->html('text');
        $this->fields->string('phone', 20)->nullable()->html('text');
    }

   



}
