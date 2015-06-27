<?php

use Phalcon\Mvc\Router;

$router = new Router(false);
$router->setDefaultModule('frontend');

$router->add('/{alias:([^/]+)}.html', array(
    'controller' => 'blog',
    'alias' => 1
))->setName('blog');

$router->add('/{alias:([a-z0-9\-]+)}/', array(
    'controller' => 'category',
    'alias' => 1
))->setName('category');

$router->add('/{alias:([a-z0-9\-]+)}/{page:([0-9]+)}/', array(
    'controller' => 'category',
    'alias' => 1,
    'page' => 2
))->setName('category_pages');

$router->add('/page/{page:([0-9]+)}/', array(
    'controller' => 'home',
    'page' => 1
))->setName('home_pages');

$router->add('/page-{alias:([a-z]+)}.html', array(
    'controller' => 'page',
    'alias' => 1
))->setName('static');

$router->add('/', array(
    'controller' => 'home',
))->setName('home');

$router->add('/admin/category/', array(
    'module' => 'backend',
    'controller' => 'category'
))->setName('admin-category');

$router->add('/admin/category/add/', array(
    'module' => 'backend',
    'controller' => 'category',
    'action' => 'add'
))->setName('category-add');

$router->add('/admin/category/edit/{id:([0-9]+)}', array(
    'module' => 'backend',
    'controller' => 'category',
    'action' => 'add',
    'id' => 1
))->setName('category-edit');

$router->add('/admin/category/delete/{id:([0-9]+)}', array(
    'module' => 'backend',
    'controller' => 'category',
    'action' => 'delete',
    'id' => 1
))->setName('category-delete');

$router->add('/admin/post/add/', array(
    'module' => 'backend',
    'controller' => 'blog',
    'action' => 'add'
))->setName('blog-add');

$router->add('/admin/post/', array(
    'module' => 'backend',
    'controller' => 'blog',
))->setName('admin-blog');

$router->add('/admin/post/edit/{id:([0-9]+)}', array(
    'module' => 'backend',
    'controller' => 'blog',
    'action' => 'add',
    'id' => 1
))->setName('blog-edit');

$router->add('/admin/post/delete/{id:([0-9]+)}', array(
    'module' => 'backend',
    'controller' => 'blog',
    'action' => 'delete',
    'id' => 1
))->setName('blog-delete');

$router->add('/logout/', array(
    'module' => 'backend',
    'controller' => 'session',
    'action' => 'logout'
))->setName('logout');

$router->add('/admin/', array(
    'module' => 'backend',
    'controller' => 'session',
    'action' => 'login'
))->setName('admin');

$router->notFound(array(
    'controller' => 'home',
    'action' => 'notFound'
));

$router->handle();
return $router;