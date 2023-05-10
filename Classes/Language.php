<?php

namespace Modules\Core\Classes;

use Config;
use Illuminate\Support\Facades\Cache;
use Modules\Core\Entities\Language as DBLanguage;

class Language
{

    public function getDefaultLanguage()
    {
        $language = $this->getLanguage('en-us');

        $language_id = Config::get('core.default_language');
        if ($language_id) {
            $language = $this->getLanguageById($language_id);
        }

        return $language;
    }

    public function getLanguageById($id)
    {
        if (Cache::has("core_language_" . $id . "_id")) {
            $language = Cache::get("core_language_" . $id . "_id");
            return $language;
        } else {
            try {
                $language = DBLanguage::where('id', $id)->first();

                Cache::put("core_language_" . $id . "_id", $language, 3600);
                return $language;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        return false;
    }

    public function getLanguage($slug)
    {
        if (Cache::has("core_language_" . $slug)) {
            $language = Cache::get("core_language_" . $slug);
            return $language;
        } else {
            try {
                $language = DBLanguage::where('slug', $slug)->first();

                Cache::put("core_language_" . $slug, $language, 3600);
                return $language;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        return false;
    }

    public function getLanguageId($code)
    {
        $language = $this->getLanguage($code);

        $language_id = $language->id;

        return $language_id;
    }

}
