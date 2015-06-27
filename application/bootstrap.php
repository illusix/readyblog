<?php

namespace Application;

use Phalcon\Mvc\Application,
    Phalcon\Loader,
    Phalcon\Di\FactoryDefault,
    Phalcon\Db\Adapter\Pdo\Mysql as Database,
    Phalcon\Mvc\Url,
    Phalcon\Mvc\Model\MetaData\Files as MetaDataAdapter,
    Phalcon\Session\Adapter\Files as SessionAdapter,
    Phalcon\Flash\Direct as Flash;


class Bootstrap extends Application
{
    protected function registerLoader()
    {
        $loader = new Loader();
        $loader->registerNamespaces(array(
            'Library' => __DIR__ . '/library/'
        ))->register();

        require_once __DIR__ . '/vendor/autoloaders.php';
    }

    protected function registerServices()
    {
        $di = new FactoryDefault();
        $di->set('router', function() {
            return require_once __DIR__ . '/router.php';
        });
        $this->setDI($di);

        $di->set('config', function() {
            return require_once __DIR__ . '/common/configs.php';
        });

        $di->set('url', function() use ($di) {
            $url = new Url();
            $url->setBaseUri($di['config']->app->baseUri);
            return $url;
        });

        $di->set('modelsMetadata', function () {
            return new MetaDataAdapter(array(
                'metaDataDir' => __DIR__ . '/cache/metaData/'
            ));
        });

        $di->set('session', function () {
            $session = new SessionAdapter();
            $session->start();
            return $session;
        });

        $di->set('flash', function () {
            return new Flash(array(
                'error' => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice' => 'alert alert-info',
                'warning' => 'alert alert-warning'
            ));
        });

        $di->set('auth', function () {
            return new \Library\Auth\Auth();
        });

        $di->set('db', function() use ($di) {
            return new Database(array(
                'host' => $di['config']->app->database->host,
                'username' => $di['config']->app->database->username,
                'password' => $di['config']->app->database->password,
                'dbname' => $di['config']->app->database->dbname,
                'options' => array(
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                )
            ));
        });
    }

    public function run()
    {
        $this->registerLoader();
        $this->registerServices();
        $this->registerModules(array(
            'frontend' => array(
                'className' => 'Frontend\Module',
                'path' => __DIR__ . '/frontend/Module.php'
            ),
            'backend' => array(
                'className' => 'Backend\Module',
                'path' => __DIR__ . '/backend/Module.php'
            )
        ));
        echo $this->handle()->getContent();
    }
} 