<?php

return new \Phalcon\Config(array(
    'app' => array(
        'database' => array(
            'host' => 'localhost',
            'username' => '',
            'password' => '',
            'dbname' => ''
        ),
        'staticBaseUri' => 'http://blog.ready.wiki/',
        'baseUri' => '/',
        'uploadDir' => __DIR__ . '/../../htdocs/img/blog/'
    ),
    'view' => array(
        'per_page' => 5,
    )
));