<?php

namespace Backend\Models;

use \Phalcon\Mvc\Model;

class Category extends Model
{
    public $id;
    public $name;
    public $alias;
    public $status;
    public $date_create;

    public function initialize()
    {
        $this->hasMany('id', 'Backend\Models\Blog', 'category_id', array(
            'alias' => 'blog',
            'foreing_key' => array(
                'message' => 'Category is used'
            )
        ));
        $this->skipAttributesOnUpdate(array('date_create'));
    }
    
    public function beforeValidationOnCreate()
    {
        if (empty($this->date_create)) {
            $this->date_create = date('Y:m:d H:i:s', time());
        }
    }
    
    public function getDateCreate()
    {
        return date('d.m.Y', strtotime($this->date_create));
    }
} 