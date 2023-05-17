<?php

namespace Modules\Core\Entities\Data;

use Modules\Base\Classes\Datasetter;

class Language
{
    public $ordering = 3;

    public function data(Datasetter $datasetter)
    {
        $datasetter->add_data('core', 'language', 'slug', [
            "name" => "English-US",
            "slug" => "en-us",
        ]);
    }
}
