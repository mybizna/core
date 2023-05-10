<?php

namespace Modules\Core\Classes;

use Config;
use Illuminate\Support\Facades\Cache;
use Modules\Core\Entities\Currency as DBCurrency;

class Currency
{

    public function getDefaultCurrency()
    {
        $currency = $this->getCurrency('USD');

        $currency_id = Config::get('core.default_currency');
        if ($currency_id) {
            $currency = $this->getCurrencyById($currency_id);
        }

        return $currency;
    }

    public function getCurrencyById($id)
    {
        if (Cache::has("core_currency_" . $id . "_id")) {
            $currency = Cache::get("core_currency_" . $id . "_id");
            return $currency;
        } else {
            try {
                $currency = DBCurrency::where('id', $id)->first();

                Cache::put("core_currency_" . $id . "_id", $currency, 3600);
                return $currency;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        return false;
    }

    public function getCurrency($code)
    {
        if (Cache::has("core_currency_" . $code)) {
            $currency = Cache::get("core_currency_" . $code);
            return $currency;
        } else {
            try {
                $currency = DBCurrency::where('code', $code)->first();

                Cache::put("core_currency_" . $code, $currency, 3600);
                return $currency;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        return false;
    }

    public function getCurrencyId($code)
    {
        $currency = $this->getCurrency($code);

        $currency_id = $currency->id;

        return $currency_id;
    }

}
