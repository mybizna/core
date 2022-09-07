<?php

namespace Modules\Core\Classes;

use Illuminate\Support\Facades\DB;
use Modules\Core\Entities\Setting as DBSetting;

class Setting
{
    public function saveSetting($module, $model, $name, $type, $value)
    {
        DBSetting::create([
            'module' => $module,
            'model' => $model,
            'name' => $name,
            'type' => $type,
            'value' => $value
        ]);
    }
}
