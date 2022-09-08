<?php
$this->add_submenu("account", "setting", "", "", 10);
$this->add_submenu("account", "setting", "More Setting", "/core/admin/setting/manage", 10);

$this->add_module_info("core", [
    'title' => 'Core',
    'description' => 'Core',
    'icon' => 'fas fa-receipt',
    'path' => '/core',
    'class_str'=> 'text-warning border-warning'
]);

$this->add_menu("core", "country", "Country", "/country", "fas fa-cogs", 5);
$this->add_menu("core", "currency", "Currency", "/currency", "fas fa-cogs", 5);
$this->add_menu("core", "setting", "Setting", "/setting", "fas fa-cogs", 5);
$this->add_menu("core", "state", "State", "/state", "fas fa-cogs", 5);
$this->add_menu("core", "timezone", "Timezone", "/timezone", "fas fa-cogs", 5);
