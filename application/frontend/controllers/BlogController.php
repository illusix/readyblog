<?php

namespace Frontend\Controllers;

use Frontend\Models\Blog;
use Frontend\Models\Category;

class BlogController extends InitController
{
    public function indexAction()
    {
        $alias = $this->dispatcher->getParam('alias');
        $blog = Blog::findFirstByAlias($alias);

        if (!isset($blog->id) && !$blog->id) {
            $this->notFoundAction();
        }

        $this->view->setVars(array(
            'blog' => $blog,
            'description' => $blog->title . ' on Ready.Blog'
        ));
        $this->tag->prependTitle($blog->title);
    }
} 