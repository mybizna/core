<?php

namespace Modules\Core\Entities\Data;

use Modules\Base\Classes\Datasetter;
use DB;

class LanguageTranslation
{
    public $ordering = 5;

    public function data(Datasetter $datasetter)
    {

        $language_id = DB::table('core_language')->where( 'slug', 'en-us')->value('id');

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "site-title",
            "language_id" => $language_id ,
            "phrase" => "ERP",
        ]);
    }
}
