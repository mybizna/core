<?php

namespace Modules\Core\Classes;

use Modules\Core\Entities\Setting as DBSetting;

class Setting
{
    public function saveSetting($module, $model, $name, $type, $value)
    {
        if ($value != '') {
            $setting = DBSetting::where(['module' => $module, 'model' => $model, 'name' => $name])->first();
           
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            } else {
                DBSetting::create([
                    'module' => $module,
                    'model' => $model,
                    'name' => $name,
                    'type' => $type,
                    'value' => $value,
                ]);

            }

        }

    }
}
