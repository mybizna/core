<?php

namespace Modules\Core\Listeners;

use Modules\Core\Entities\LanguageTranslation;

class CoreLanguageCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $table_name = $event->table_name;

        if ($table_name == 'core_language') {

            $language = $event->model;

            $translations = LanguageTranslation::where('language_id', $language->id)->get();

            foreach ($translations as $key => $translation) {
                LanguageTranslation::create([
                    'slug' => $translation->slug,
                    'language_id' => $language->id,
                    'phrase' => $translation->phrase,
                ]);
            }
        }

    }
}
