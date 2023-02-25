<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class Timezone extends BaseModel
{

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $migrationDependancy = ['core_country'];

    protected $fillable = ["name", "country_id", "is_system",];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'core_timezone';

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
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('name', 255);
        $table->unsignedInteger('country_id')->nullable()->default(null);
        $table->tinyInteger('is_system')->default(false);
    }

    public function post_migration(Blueprint $table)
    {
        if (Migration::checkKeyExist('core_timezone', 'country_id')) {
            $table->foreign('country_id')->references('id')->on('core_country')->nullOnDelete();
        }
    }

    public function deleteRecord($id)
    {

        $timezone = $this->where('id', $id)->first();

        if ($timezone->is_system) {
            return [
                'module' => $this->module,
                'model' => $this->model,
                'status' => 0,
                'error' => 1,
                'record' => [],
                'message' => 'You can not Delete a Timezone Set by system..',
            ];
        }

        parent::deleteRecord($id);

    }
}
