<?php

namespace Backend\Controllers;

use Backend\Models\Category;
use Backend\Forms\CategoryForm;

class CategoryController extends InitController
{
    public function indexAction()
    {
        $category_list = Category::find();
        $page = $this->dispatcher->getParam('page', 'int', 1);

        $paginator = new \Phalcon\Paginator\Adapter\Model(array(
            'data' => $category_list,
            'limit' => $this->config->view->per_page,
            'page' => $page,
        ));

        $collection = $paginator->getPaginate();

        $this->view->setVars(array(
            'category_list' => $category_list,
            'collection' => $collection
        ));
    }
    
    public function addAction()
    {
        $id = $this->dispatcher->getParam('id', 'int', 0);
        $category = new Category();
        
        if ($id) {
            $form = new CategoryForm(Category::findFirstById($id), array('edit' => true));    
        } else {
            $form = new CategoryForm($category);    
        }
        
        if ($this->request->isPost()) {
            $data = $this->request->getPost();

            if ($form->isValid($data)) {
                $category->assign($data);

                if (!$category->save()) {
                    $this->flash->error($category->getMessages());
                } else {
                    $this->flash->success('Category was created successfully');
                    return $this->response->redirect('admin/category/');
                }    
            }
        }
        
        $this->view->form = $form;
    }
    
    public function deleteAction($id)
    {
        $category = Category::findFirstById($id);
        
        if (!$category) {
            $this->flash->error('Category was not found');
            return $this->response->redirect('admin/category/');
        }
        
        if (sizeof($category->blog->toArray())) {
            return $this->response->redirect('admin/category/');    
        }
        
        if (!$category->delete()) {
            $this->flash->error($user->getMessages());
        } else {
            $this->flash->success('Category was deleted');
        }
        return $this->response->redirect('admin/category/');
    }
} 