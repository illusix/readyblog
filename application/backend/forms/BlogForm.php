<?php

namespace Backend\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\TextArea,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Select;
use Phalcon\Mvc\Model\Validator\Regex,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength;
use Backend\Models\Category;


class BlogForm extends Form {

    public function initialize($entity = null, $options = null)
    {
        $category = new Select(
            'category_id',
            Category::find(),
            array('class' => 'form-control', 'using' => array('id','name')));
        $category->addValidators(array(
            new PresenceOf(array(
                'message' => 'The category is required',
                'cancelOnFail' => true
            ))
        ));
        $this->add($category);

        $title = new Text('title', array(
            'placeholder' => 'Post title',
            'maxlength' => 255,
            'class' => 'form-control'
        ));

        $title->addValidators(array(
            new PresenceOf(array(
                'message' => 'The title is required',
                'cancelOnFail' => true
            )),

            new StringLength(array(
                'message' => 'Length of title must be less 255',
                'max' => 255
            ))
        ));
        $title->setFilters(array('trim', 'string', 'striptags'));
        $this->add($title);

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

        $img = new \Phalcon\Forms\Element\File('icon', array(
            'placeholder' => 'Image'
        ));
        $this->add($img);

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

        $content = new TextArea('content', array('class' => 'form-control', 'rows' => 15));
        $content->addValidators(array(
            new PresenceOf(array(
                'message' => 'The content is required',
            ))
        ));
        $content->setFilters(array('trim', 'string'));
        $this->add($content);

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