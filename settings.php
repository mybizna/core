<?php

use Modules\Core\Classes\Currency;
use Modules\Core\Classes\Language;

$currency = new Currency();
$language = new Language();

$currency_id = $currency->getCurrencyId('USD');
$language = $language->getLanguage('en-us');

return [
    'company_name' => [
        "title" => "Company Name",
        "type" => "text",
        "value" => "Mybizna",
        "category" => "Company",
    ],
    'company_email' => [
        "title" => "Company Email",
        "type" => "text",
        "value" => "info@mybizna.com",
        "category" => "Company",
    ],
    'company_phone' => [
        "title" => "Company Phone",
        "type" => "text",
        "value" => "0713034569",
        "category" => "Company",
    ],
    'company_po_box' => [
        "title" => "Company P.O Box",
        "type" => "text",
        "value" => "767",
        "category" => "Company",
    ],
    'company_po_code' => [
        "title" => "Company P.O Code",
        "type" => "text",
        "value" => "00618",
        "category" => "Company",
    ],
    'company_zip_code' => [
        "title" => "Company ZIP Code",
        "type" => "text",
        "value" => "",
        "category" => "Company",
    ],
    'company_location' => [
        "title" => "Company Address",
        "type" => "text",
        "value" => "Room 411B 5th Floor, Jewel Plaza Kasarani, Nairobi.",
        "category" => "Company",
    ],
    'default_currency' => [
        "title" => "Default Currency",
        "type" => "recordpicker",
        "value" => $currency_id,
        "comp_url" => "core/admin/currency/list.vue",
        "setting" => [
            'path_param' => ["core", "currency"],
            'fields' => ['name', 'code'],
            'template' => '[name] ([code])',

        ],
        "category" => "System",
    ],
    'default_language' => [
        "title" => "Default Language",
        "type" => "recordpicker",
        "value" => $language->id,
        "comp_url" => "core/admin/language/list.vue",
        "setting" => [
            'path_param' => ["core", "language"],
            'fields' => ['name', 'slug'],
            'template' => '[name] ([slug])',

        ],
        "category" => "System",
    ],
];
