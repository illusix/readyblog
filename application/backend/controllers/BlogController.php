<?php

namespace Backend\Controllers;

use Backend\Forms\BlogForm;
use Backend\Models\Blog;

class BlogController extends InitController
{
    public function indexAction()
    {
        $blog_list = Blog::find();
        $page = $this->dispatcher->getParam('page', 'int', 1);

        $paginator = new \Phalcon\Paginator\Adapter\Model(array(
            'data' => $blog_list,
            'limit' => $this->config->view->per_page,
            'page' => $page,
        ));

        $collection = $paginator->getPaginate();

        $this->view->setVars(array(
            'blog_list' => $blog_list,
            'collection' => $collection
        ));
    }

    public function addAction()
    {
        $id = $this->dispatcher->getParam('id', 'int', 0);
        $blog = new Blog();
        
        if ($id) {
            $form = new BlogForm(Blog::findFirstById($id), array('edit' => true));    
        } else {
            $form = new BlogForm($blog);    
        }
        
        if ($this->request->isPost()) {
            $blogData = $this->request->getPost();

            if ($form->isValid($blogData)) {
                $blog->assign($blogData);
                $blog->user_id = $this->auth->getUser()->id;

                if (!$blog->save()) {
                    $this->flash->error($blog->getMessages());
                } else {
                    $image = $this->saveImage($blog->id);
                    $blog->icon = $image['extension'];
                    $blog->save();
                    $this->flash->success('Post was created successfully');
                    return $this->response->redirect('admin/post/');
                }    
            }
        }
        
        $this->view->form = $form;
        $this->assets->collection('ckeditor')->addJs('../js/plugins/ckeditor/ckeditor.js')
            ->addJs('../js/ckinit.js');
    }
    
    public function deleteAction($id)
    {
        $blog = Blog::findFirstById($id);
        
        if (!$blog) {
            $this->flash->error('Post was not found');
            return $this->response->redirect('admin/post/');
        }
        if (!$blog->delete()) {
            $this->flash->error($user->getMessages());
        } else {
            $this->flash->success('Post was deleted');
        }
        return $this->response->redirect('admin/post/');
    }
    
    protected function saveImage($fileName)
    {
        $image = array();
        
        if ($this->request->hasFiles() == true) {
            $baseLocation = $this->config->app->uploadDir;

            foreach ($this->request->getUploadedFiles() as $file) {
                $image['name'] = $file->getName();
                $image['size'] = $file->getSize();
                $image['extension'] = $file->getExtension();
                $file->moveTo($baseLocation . $fileName . '.' . $image['extension']);
                break;
            }
        }
        
        return $image;
    }
} 