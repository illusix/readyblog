<?php

namespace Backend\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Select,
    Phalcon\Forms\Element\Hidden;
use Phalcon\Mvc\Model\Validator\Regex,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength;
use Backend\Models\Category;


class CategoryForm extends Form {

    public function initialize($entity = null, $options = null)
    {
        $name = new Text('name', array(
            'placeholder' => 'Category name',
            'maxlength' => 255,
            'class' => 'form-control'
        ));

        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'The name is required',
                'cancelOnFail' => true
            )),

            new StringLength(array(
                'message' => 'Length of name must be less 255',
                'max' => 255
            ))
        ));
        $name->setFilters(array('trim', 'string', 'striptags'));
        $this->add($name);

        $alias = new Text('alias', array(
            'placeholder' => 'Post alias',
            'maxlength' => 255,
            'class' => 'form-control'
        ));

        $alias->addValidators(array(
            new PresenceOf(array(
                'message' => 'The alias is required',
                'cancelOnFail' => true
            )),

            new StringLength(array(
                'message' => 'Length of alias must be less 255',
                'max' => 255
            ))
        ));
        $alias->setFilters(array('trim', 'string', 'striptags'));
        $this->add($alias);

        $status = new Select(
            'status',
            array(1 => 'Active', 2 => 'Blocked'),
            array('class' => 'form-control'));
        $status->addValidators(array(
            new PresenceOf(array(
                'message' => 'The status is required',
            ))
        ));
        $this->add($status);

        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
            $id->addValidators(array(
                new PresenceOf(array(
                    'message' => 'The ID is required',
                    'cancelOnFail' => true
                ))
            ));

            $this->add($id);
        }
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