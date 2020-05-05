<?php

return array(
    'dashboard' => [
        'namespace' => 'KCV\Dashboard',
        'webControllerNamespace' => 'KCV\Dashboard\Presentation\Web\Controller',
        'apiControllerNamespace' => '',
        'className' => 'KCV\Dashboard\Module',
        'path' => APP_PATH . '/modules/dashboard/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'index',
        'defaultAction' => 'index'
    ],
);