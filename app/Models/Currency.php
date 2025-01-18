<?php

namespace Modules\Core\Models;

use Modules\Base\Classes\Migration;
use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

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
     * Function for deleting a record.
     *
     * @param int $id
     *
     * @return array
     */
    public function deleteRecord($id): mixed
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

    public function migration(Blueprint $table): void
    {

        $table->string('name', 255);
        $table->string('code', 255)->nullable()->default(null);
        $table->string('symbol', 255)->nullable()->default(null);
        $table->decimal('rate', 11, 2)->nullable()->default(null);
        $table->decimal('buying', 11, 2)->nullable()->default(null);
        $table->decimal('selling', 11, 2)->nullable()->default(null);
        $table->integer('published')->nullable()->default(0);
        $table->integer('is_fetched')->nullable()->default(0);
        $table->tinyInteger('is_system')->nullable()->default(0);

    }
}
