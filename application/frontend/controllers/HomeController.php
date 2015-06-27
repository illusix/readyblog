<?php

namespace Frontend\Controllers;

use Frontend\Models\Category,
    Frontend\Models\Blog;

class HomeController extends InitController
{
    public function indexAction()
    {
        $page = $this->dispatcher->getParam('page', 'int', 1);

        $blog_list = Blog::find(array(
            'conditions' => 'status = :status:',
            'order' => 'date_create DESC',
            'bind' => array('status' => 1),
        ));

        $paginator = new \Phalcon\Paginator\Adapter\Model(array(
            'data' => $blog_list,
            'limit' => $this->config->view->per_page,
            'page' => $page,
        ));

        $collection = $paginator->getPaginate();
        if ($page <= 0 || ($page != 1 && $page > $collection->last)) {
            return $this->notFoundAction();
        }

        $this->view->setVars(array(
            'blog_list' => $blog_list,
            'collection' => $collection
        ));
        
        $this->tag->prependTitle('Posts');
    }
}