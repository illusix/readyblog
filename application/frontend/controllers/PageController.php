<?php

namespace Frontend\Controllers;

class PageController extends InitController
{
    public function indexAction()
    {
        $alias = $this->dispatcher->getParam('alias');
        $this->view->setVar('title', $alias);
    }
} 