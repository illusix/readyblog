<?php

namespace Frontend\Models;

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
        $this->hasMany('id', 'Frontend\Models\Blog', 'category_id', array(
            'alias' => 'blog'
        ));
    }
} 