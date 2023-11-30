<?php

namespace Modules\Core\Classes;

use Modules\Core\Entities\Setting as DBSetting;
use Modules\Core\Events\Setting as EVSetting;

class Setting
{
    public function saveSetting($module, $model, $name, $type, $value)
    {
        $oldvalue = $value;

        if ($value != '') {
            $setting = DBSetting::where(['module' => $module, 'model' => $model, 'name' => $name])->first();

            if ($setting) {
                $oldvalue = $setting->value;

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

        event(new EVSetting($module, $model, $name, $value, $oldvalue));

    }
}
