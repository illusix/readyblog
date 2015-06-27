<?php

use Phalcon\Mvc\Router;

$router = new Router(false);
$router->setDefaultModule('frontend');

$router->add('/page-{alias:([a-z]+)}', array(
    'controller' => 'page',
    'alias' => 1
))->setName('static');

$router->add('/page/{page:([0-9]+)}/', array(
    'controller' => 'home',
    'page' => 1
))->setName('home_page');

$router->add('/{alias:([a-z0-9\-]+)}/', array(
    'controller' => 'category',
    'alias' => 1
))->setName('category');

$router->add('/{alias:([a-z0-9\-]+)}/{page:([0-9]+})/', array(
    'controller' => 'category',
    'alias' => 1,
    'page' => 2
))->setName('category_page');
$router->handle();
return $router;