<?php

namespace Frontend\Models;

use Phalcon\Mvc\Model;

class Blog extends Model
{
    public $id;
    public $title;
    public $alias;
    public $content;
    public $user_id;
    public $category_id;
    public $status;
    public $icon;
    public $date_create;

    public function initialize()
    {
        $this->belongsTo('user_id', 'Frontend\Models\User', 'id', array(
            'alias' => 'writer',
        ));
        $this->belongsTo('category_id', 'Frontend\Models\Category', 'id', array(
            'alias' => 'category',
        ));
    }

    public function getDateCreate()
    {
        return date('d.m.Y', strtotime($this->date_create));
    }
    
    public function getShortContent()
    {
        return mb_substr($this->content, 0, 180, 'UTF-8');
    }
} 