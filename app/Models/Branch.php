<?php

namespace Modules\Core\Models;

use Modules\Base\Models\BaseModel;
use Modules\Core\Models\Company;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_branch";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'company_id', 'name', 'address_1', 'address_2', 'city', 'state',
        'zip', 'country', 'fax', 'phone',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Add relationship to Company
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->unsignedBigInteger('company_id')->nullable();
        $table->string('name')->nullable();
        $table->string('address_1')->nullable();
        $table->string('address_2')->nullable();
        $table->string('city', 100)->nullable();
        $table->string('state', 100)->nullable();
        $table->integer('zip')->nullable();
        $table->unsignedBigInteger('country_id')->nullable();
        $table->string('fax', 20)->nullable();
        $table->string('phone', 20)->nullable();

    }
    public function post_migration(Blueprint $table): void
    {
        $table->foreign('company_id')->references('id')->on('core_company')->onDelete('set null');
        $table->foreign('country_id')->references('id')->on('core_country')->onDelete('set null');
    }
}
