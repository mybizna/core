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
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['name'];

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

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['name', 'city', 'state', 'country_id', 'fax', 'phone'];
        $structure['form'] = [
            ['label' => 'Branch Name', 'class' => 'col-span-full', 'fields' => ['name']],
            ['label' => 'Branch Address', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['phone', 'city', 'state', 'country_id']],
            ['label' => 'Other Branch Setting', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['fax', 'zip', 'address_1', 'address_2']],
        ];
        $structure['filter'] = ['name', 'city', 'state', 'country'];

        return $structure;
    }

    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {
        $rights = parent::rights();

        $rights['staff'] = ['view' => true];
        $rights['registered'] = [];
        $rights['guest'] = [];

        return $rights;
    }

}
