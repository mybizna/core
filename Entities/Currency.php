<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class Currency extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'core_currency';

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        "name", "code", "symbol", "rate", 'is_system',
        "buying", "selling", "published", "is_fetched",
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['name', 'code'];

    /**
     * The table associated with the model.
     *
     * @var string
     */

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
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->increments('id')->html('hidden');
        $this->fields->string('name', 255)->html('text');
        $this->fields->string('code', 255)->nullable()->default(null)->html('text');
        $this->fields->string('symbol', 255)->nullable()->default(null)->html('text');
        $this->fields->decimal('rate', 11, 2)->nullable()->default(null)->html('text');
        $this->fields->decimal('buying', 11, 2)->nullable()->default(null)->html('text');
        $this->fields->decimal('selling', 11, 2)->nullable()->default(null)->html('text');
        $this->fields->integer('published')->nullable()->default(0)->html('switch');
        $this->fields->integer('is_fetched')->nullable()->default(0)->html('switch');
        $this->fields->tinyInteger('is_system')->nullable()->default(0)->html('switch');
    }

    /**
     * Function for deleting a record.
     *
     * @param int $id
     *
     * @return array
     */
    public function deleteRecord($id)
    {

        $currency = $this->where('id', $id)->first();

        if ($currency->is_system) {
            return [
                'module' => $this->module,
                'model' => $this->model,
                'status' => 0,
                'error' => 1,
                'record' => [],
                'message' => 'You can not Delete a Currency Set by system..',
            ];
        }

        return parent::deleteRecord($id);

    }
}
