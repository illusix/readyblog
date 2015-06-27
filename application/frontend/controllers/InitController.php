<?php
/**
 * Created by PhpStorm.
 * User: Alexandr
 * Date: 27.06.2015
 * Time: 0:30
 */

namespace Frontend\Controllers;

use Phalcon\Mvc\Controller;

class InitController extends Controller
{
    public function initialize()
    {
        $this->view->setTemplateBefore('public');
        $this->assets->collection('header')
            ->addCss('//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css', false)
            ->addCss('css/bootstrap.css')
            ->addCss('css/theme.css')
            ->addCss('css/main.css');
        $this->assets->collection('footer')
            ->addJs('js/jquery-1.11.1.min.js')
            ->addJs('js/plugins/bootstrap/bootstrap.min.js', false);
        $this->tag->setTitle(' - Ready Blogger');
    }

    public function afterExecuteRoute()
    {
        $category_list = \Frontend\Models\Category::find(array(
            'columns' => 'alias,name',
            'conditions' => 'status = :status:',
            'order' => 'alias',
            'bind' => array('status' => 1),
        ));
        
        $blog_list = \Frontend\Models\Blog::find(array(
            'conditions' => 'status = :status:',
            'order' => 'date_create',
            'limit' => 3,
            'bind' => array('status' => 1),
        ));

        $this->view->setVars(array(
            'categories' => $category_list,
            'latest' => $blog_list, 
            'description' => '',
        ));
    }

    public function notFoundAction()
    {
        $this->response->setStatusCode(404, 'Not Found');
        $this->view->setVar('title', 'Page Not Found');
    }
} 