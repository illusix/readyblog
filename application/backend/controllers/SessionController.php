<?php

namespace Backend\Controllers;

use Backend\Forms\LoginForm;

class SessionController extends InitController
{
    public function initialize()
    {
        parent::initialize();
        $this->assets->collection('header')->addCss('css/login.css');
    }

    public function loginAction()
    {
        if (isset($this->auth->getUser()->id)) {
            return $this->response->redirect('admin/post/');    
        }
        
        $form = new LoginForm();

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost()) != false) {
                $this->auth->check(array(
                    'login' => $this->request->getPost('login'),
                    'password' => $this->request->getPost('password'),
                ));
                return $this->response->redirect('admin/post/');
            } else {
                $this->flash->error($form->getMessages());
            }
        }

        $this->view->form = $form;
    }

    public function logoutAction()
    {
        $this->auth->remove();
        return $this->response->redirect('admin/');
    }
} 