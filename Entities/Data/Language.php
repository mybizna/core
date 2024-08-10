<?php

namespace Modules\Core\Models\Data;

use Modules\Base\Classes\Datasetter;

class Language
{
    /**
     * Set ordering of the Class to be migrated.
     *
     * @var int
     */
    public $ordering = 3;

    /**
     * Run the database seeds with system default records.
     *
     * @param Datasetter $datasetter
     *
     * @return void
     */
    public function data(Datasetter $datasetter): void
    {
        $datasetter->add_data('core', 'language', 'slug', [
            "name" => "English-US",
            "slug" => "en-us",
        ]);
    }
}
