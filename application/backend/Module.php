<?php

namespace Backend;

use \Phalcon\Mvc\Dispatcher,
    \Phalcon\Mvc\Router,
    \Phalcon\Loader,
    \Phalcon\Mvc\View\Engine\Volt,
    \Phalcon\Mvc\View;

class Module {

    public function registerAutoLoaders()
    {
        $loader = new Loader();
        $loader->registerNamespaces(array(
            'Backend\Controllers' => __DIR__ . '/controllers/',
            'Backend\Models' => __DIR__ . '/models/',
            'Backend\Forms' => __DIR__ . '/forms/',
            'Library' => __DIR__ . '/../library/',
        ))->register();
    }

    public function registerServices(\Phalcon\DiInterface $di)
    {
        $di->set('dispatcher', function() {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('Backend\Controllers\\');
            return $dispatcher;
        });

        $di->set('view', function() {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');
            $view->setPartialsDir('/partials/');
            $view->registerEngines(array(
                '.volt' => function($view, $di) {
                    $volt = new Volt($view, $di);
                    $volt->setOptions(array(
                        'compiledPath' => function($templatePath) {
                            return __DIR__ . '/template_c/' . basename($templatePath) . '.php';
                        },
                        'compiledSeparator' => '_',
                        'compileAlways' => true,
                    ));
                    return $volt;
                }
            ));

            return $view;
        });
    }
} 