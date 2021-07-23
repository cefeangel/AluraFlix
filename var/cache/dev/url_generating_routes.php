<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    'ola_mundo' => [[], ['_controller' => ['App\\Controller\\VideoController', 'olaMundo']], [], [['text', '/ola']], [], []],
    'all_video' => [[], ['_controller' => ['App\\Controller\\VideoController', 'allVideo']], [], [['text', '/video']], [], []],
    'video_single' => [['id'], ['_controller' => ['App\\Controller\\VideoController', 'findById']], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/video']], [], []],
    'video_save' => [[], ['_controller' => ['App\\Controller\\VideoController', 'save']], [], [['text', '/video']], [], []],
    'video_update' => [[], ['_controller' => ['App\\Controller\\VideoController', 'udpate']], [], [['text', '/video']], [], []],
    'video_delete' => [['id'], ['_controller' => ['App\\Controller\\VideoController', 'remove']], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/video']], [], []],
];