<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/account' => [
            [['_route' => 'account', '_controller' => 'App\\Controller\\AccountController::index'], null, null, null, false, false, null],
            [['_route' => 'index', '_controller' => 'App\\Controller\\AccountController::index'], null, null, null, false, false, null],
        ],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/admin/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, null, null, false, false, null]],
        '/telesiege/default' => [[['_route' => 'telesiege_default', '_controller' => 'App\\Controller\\TelesiegeController::createDefaultTelesiege'], null, ['GET' => 0], null, false, false, null]],
        '/telesiege/add' => [[['_route' => 'add_telesiege', '_controller' => 'App\\Controller\\AccountController::addTelesiege'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/piste/add' => [[['_route' => 'add_piste', '_controller' => 'App\\Controller\\AccountController::addPiste'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/piste/delete/([^/]++)(?'
                    .'|(*:32)'
                .')'
                .'|/telesiege/delete/([^/]++)(?'
                    .'|(*:69)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        32 => [
            [['_route' => 'delete_piste"', '_controller' => 'App\\Controller\\AccountController::deletePiste'], ['id'], null, null, false, true, null],
            [['_route' => 'delete_piste', '_controller' => 'App\\Controller\\AccountController::deletePiste'], ['id'], ['POST' => 0], null, false, true, null],
        ],
        69 => [
            [['_route' => 'delete_telesiege"', '_controller' => 'App\\Controller\\AccountController::deleteTelesiege'], ['id'], null, null, false, true, null],
            [['_route' => 'delete_telesiege', '_controller' => 'App\\Controller\\AccountController::deleteTelesiege'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
