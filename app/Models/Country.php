<?php
namespace Modules\Core\Models;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Models\BaseModel;

class Country extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "core_country";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'code', 'code3', 'latitude', 'longitude', 'is_system'];

    /**
     * Function for deleting a record.
     *
     * @param int $id
     *
     * @return void
     */
    public function deleteRecord($id): null | array | bool
    {

        $country = $this->where('id', $id)->first();

        if ($country->is_system) {
            return [
                'module'  => $this->module,
                'model'   => $this->model,
                'status'  => 0,
                'error'   => 1,
                'record'  => [],
                'message' => 'You can not Delete a Country Set by system.',
            ];
        }

        return parent::deleteRecord($id);

    }

    public function migration(Blueprint $table): void
    {

        $table->string('name');
        $table->string('code', 2);
        $table->string('code3', 3)->nullable()->default(null);
        $table->string('latitude')->nullable()->default(null);
        $table->string('longitude')->nullable()->default(null);
        $table->tinyInteger('is_system')->nullable()->default(0);
    }
}
