<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class DataMigrated extends BaseModel
{

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'module',
        'table_name',
        'array_key',
        'item_id',
        'counter',
        'hash',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['array_key'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'core_data_migrated';

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * Get the user that created the record.
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user that created the record.
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user that created the record.
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrderByCreatedAt($query)
    {
        return $query->orderBy('created_at', 'DESC');
    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table): void
    {
        $table->bigIncrements('id');
        $table->string('module', 255);
        $table->string('table_name', 255);
        $table->string('array_key', 255);
        $table->string('hash', 255);
        $table->integer('item_id')->nullable()->default(null);
        $table->integer('counter')->nullable()->default(0);
    }
}
