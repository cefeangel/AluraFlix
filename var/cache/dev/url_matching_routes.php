<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/ola' => [[['_route' => 'ola_mundo', '_controller' => ['App\\Controller\\VideoController', 'olaMundo']], null, ['GET' => 0], null, false, false, null]],
        '/video' => [
            [['_route' => 'all_video', '_controller' => ['App\\Controller\\VideoController', 'allVideo']], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'video_save', '_controller' => ['App\\Controller\\VideoController', 'save']], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'video_update', '_controller' => ['App\\Controller\\VideoController', 'udpate']], null, ['PUT' => 0, 'PATCH' => 1], null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/video/([^/]++)(?'
                    .'|(*:60)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        60 => [
            [['_route' => 'video_single', '_controller' => ['App\\Controller\\VideoController', 'findById']], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'video_delete', '_controller' => ['App\\Controller\\VideoController', 'remove']], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
