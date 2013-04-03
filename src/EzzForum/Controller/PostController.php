<?php

/**
 * Post controller to handle creation action and index action 
 */

namespace EzzForum\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class PostController extends AbstractActionController {

    protected $postForm;

    /**
     * create post/message form action
     * 
     * @return view object
     */
    public function createAction() {

        // get form
        $form = $this->getPostForm();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                return $this->redirect()->toRoute('list');
            }
        }

        return array('form' => $form);
    }

    /**
     * list of posts/messages 
     * 
     * @return view object
     */
    public function indexAction() {
        return array();
    }

    public function getPostForm() {
        return $this->postForm;
    }

    public function setPostForm($postForm) {
        $this->postForm = $postForm;
    }

}