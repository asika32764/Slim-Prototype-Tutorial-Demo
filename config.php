<?php

define('SLIM_ROOT', __DIR__);

return array(
    'debug' => true,
    'mode' => 'development',
    'view' => new View\Twig(),
    'templates.path' => __DIR__ . '/templates'
);