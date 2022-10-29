<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\BaseController;

use Modules\Core\Classes\Setting AS SystemSetting;

class CoreController extends BaseController
{

    public function fetchSettings(Request $request)
    {
        return parent::fetchSettings($request);
    }

    public function saveSetting(Request $request)
    {
        $system_setting = new SystemSetting();

        $result = [
            'module'  => 'core',
            'model'   => 'setting',
            'status'  => 0,
            'total'   => 0,
            'error'   => 1,
            'records'    => [],
            'message' => 'No Records'
        ];

        $data = $request->all();

        $settings =  $data['settings'];

        try {
            foreach ($settings as $module => $setting) {
                foreach ($setting['settings'] as $model => $model_setting) {
                    foreach ($model_setting['list'] as $field_index => $field) {
                        $params = $field['params'];
                        $system_setting->saveSetting($module, $model, $field['name'],$params['type'], $params['value']);
                    }
                }
            }
        } catch (\Throwable $th) {
            throw $th;

            $result['error'] = 1;
            $result['status'] = 0;
            $result['message'] = 'Error While Adding new System Settings.';
        }

        return response()->json($result);
    }
}
