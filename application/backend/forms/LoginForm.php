<?php

namespace Backend\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\Identical,
    Phalcon\Validation\Validator\PresenceOf;

class LoginForm extends Form
{
    public function initialize()
    {
        $login = new Text('login', array(
            'placeholder' => 'Login'
        ));
        $login->addValidators(array(
            new PresenceOf(array(
                'message' => 'The login is required'
            )),
        ));
        $this->add($login);

        $password = new Password('password', array(
            'placeholder' => 'Password'
        ));
        $password->addValidator(new PresenceOf(array(
            'message' => 'The password is required'
        )));
        $this->add($password);

        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array(
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        )));
        $this->add($csrf);

        $this->add(new Submit('submit', array(
            'class' => 'btn btn-success'
        )));
    }

    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }
} 