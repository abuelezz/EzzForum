<?php

/**
 * Post controller to handle creation action and index action 
 */

namespace EzzForum\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use EzzForum\Form\PostForm;
use EzzForum\Form\PostInputFilter;

class PostController extends AbstractActionController {

    /**
     * create post/message form action
     * 
     * @return view object
     */
    public function createAction() {

        $form = new PostForm('post');


        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter(new PostInputFilter());
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

}