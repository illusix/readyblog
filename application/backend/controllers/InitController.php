<?php

namespace Backend\Controllers;

use Phalcon\Mvc\Controller;

class InitController extends Controller
{
    public function initialize()
    {
        $this->view->setTemplateBefore('public');
        $this->assets->collection('header')
            ->addCss('//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css', false)
            ->addCss('../css/bootstrap.css')
            ->addCss('../css/theme.css')
            ->addCss('../css/main.css');
        $this->assets->collection('footer')
            ->addJs('../js/jquery-1.11.1.min.js')
            ->addJs('../js/main.js')
            ->addJs('../js/plugins/bootstrap/bootstrap.min.js', false);
        $this->tag->setTitle('Ready Blogger Admin Panel');
    }

    public function notFoundAction()
    {
        $this->response->setStatusCode(404, 'Not Found');
        $this->view->setVar('title', 'Page Not Found');
    }

    public function beforeExecuteRoute($dispatcher)
    {
        $identity = $this->auth->getIdentity();
        $controllerName = $dispatcher->getControllerName();

        if (!is_array($identity) && $controllerName != 'session') {
            $this->flash->notice('You don\'t have access to this page');
            $dispatcher->forward(array(
                'controller' => 'session',
                'action' => 'login'
            ));

            return false;
        }
    }
} 