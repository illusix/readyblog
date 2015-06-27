<?php

namespace Backend\Models;

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
        $this->belongsTo('user_id', 'Backend\Models\User', 'id', array(
            'alias' => 'writer',
        ));
        $this->belongsTo('category_id', 'Backend\Models\Category', 'id', array(
            'alias' => 'category',
        ));
        
        $this->skipAttributesOnUpdate(array('date_create'));
    }

    public function beforeValidationOnCreate()
    {
        if (empty($this->date_create)) {
            $this->date_create = date('Y:m:d H:i:s', time());
        }

        if (empty($this->icon)) {
            $this->icon = 'jpeg';
        }
        
        if (empty($this->alias)) {
            $this->alias = $this->convertAlias($this->name);
        }
    }
    
    public function beforeValidationOnUpdate()
    {
        if (empty($this->icon)) {
            $this->icon = 'jpg';
        }
    }

    public function getDateCreate()
    {
        return date('d.m.Y', strtotime($this->date_create));
    }
    
    protected function convertAlias($alias)
    {
        $alias = mb_strtolower(trim($alias), "utf-8");  
                       
        $rus   = array(
            'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
            '~','!','@','#','%','^','&','*','(',')','_','+','-','=','`',',','.','/','<','>','{','}','[',']',';','\'','\\',':','"','|',
            ' ','№','$','«','»','"','?','"','¿','á', 'é', 'í', 'ó', 'ú', 'ñ','ü','ç'
        );    
        $eng   = array(
            'a','b','v','g','d','e','e','zh','z','i','i','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','','i','','','ju','ja',
            '','','','','','','','','','','-','','-','','','','.','','','','','','','','','','','','','',
            '-','','','','','','','','','a','e','i','o','u','n','u','c'
        );    
                      
        $alias = str_replace($rus, $eng, $alias);
        $alias = preg_replace('#([\W]+)#isu', '-', $alias);
        $alias = preg_replace('/\-{2,}/', '-', $alias);
        $alias = preg_replace('#([\-])$#', '', $alias);
        $alias = trim($alias, '-');
        return $alias;
    }
} 