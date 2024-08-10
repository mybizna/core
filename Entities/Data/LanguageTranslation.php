<?php

namespace Modules\Core\Models\Data;

use DB;
use Modules\Base\Classes\Datasetter;

class LanguageTranslation
{
    /**
     * Set ordering of the Class to be migrated.
     *
     * @var int
     */
    public $ordering = 5;

    /**
     * Run the database seeds with system default records.
     *
     * @param Datasetter $datasetter
     *
     * @return void
     */
    public function data(Datasetter $datasetter): void
    {

        $language_id = DB::table('core_language')->where('slug', 'en-us')->value('id');

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "site-title",
            "language_id" => $language_id,
            "phrase" => "ERP",
        ]);
    }
}
