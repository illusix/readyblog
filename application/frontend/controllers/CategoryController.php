<?php

namespace Frontend\Controllers;

use Frontend\Models\Category;

class CategoryController extends InitController
{
    public function indexAction()
    {
        $alias = $this->dispatcher->getParam('alias');
        $page = $this->dispatcher->getParam('page', 'int', 1);
        $category = Category::findFirstByAlias($alias);

        if (!isset($category->id) && !$category->id) {
            return $this->notFoundAction();
        }

        $blog_list = $category->getBlog(array(
            'conditions' => 'status = :status:',
            'order' => 'date_create DESC',
            'bind' => array(
                'status' => 1
            )
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
            'category' => $category,
            'collection' => $collection,
            'description' => 'Category ' . $category->name . ' on Ready.Blog'
        ));
        $this->tag->prependTitle($category->name);
    }
} 