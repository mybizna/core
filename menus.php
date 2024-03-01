<?php

/** @var \Modules\Base\Classes\Fetch\Menus $this */

$this->add_module_info("core", [
    'title' => 'Core',
    'description' => 'Core',
    'icon' => 'fas fa-receipt',
    'path' => '/core/admin/branch',
    'class_str' => 'text-warning border-warning',
]);

$this->add_menu("core", "country", "Country", "/core/admin/country", "fas fa-cogs", 5);
$this->add_menu("core", "currency", "Currency", "/core/admin/currency", "fas fa-cogs", 5);
$this->add_menu("core", "notification", "Notification", "/core/admin/notification", "fas fa-cogs", 5);
$this->add_menu("core", "state", "State", "/core/admin/state", "fas fa-cogs", 5);
$this->add_menu("core", "timezone", "Timezone", "/core/admin/timezone", "fas fa-cogs", 5);
$this->add_menu("core", "branch", "Branch", "/core/admin/branch", "fas fa-cogs", 5);

$this->add_menu("core", "language", "Language", "/core/admin/language", "fas fa-cogs", 5);
$this->add_menu("core", "language_translation", "Language Translation", "/core/admin/language_translation", "fas fa-cogs", 5);

$this->add_menu("core", "setting", "Setting", "/core/admin/setting", "fas fa-cogs", 5);
$this->add_submenu("core", "setting", "Setting List", "/core/admin/setting", 10);
$this->add_submenu("core", "setting", " Setting Tabs", "/core/admin/setting/manage", 10);

$this->group('frontend', function () {
    $this->add_menu("core", "country", "Country", "/core/front/country", "fas fa-cogs", 5);
});
