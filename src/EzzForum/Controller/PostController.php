<?php

/**
 * Post controller to handle creation action and index action 
 */

namespace EzzForum\Controller;

use KapitchiEntity\Controller\AbstractEntityController;

class PostController extends AbstractEntityController {

    protected $postForm;
    protected $entityService;

    public function getIndexUrl() {
        return $this->url()->fromRoute('forum/post', array(
                    'action' => 'index'
        ));
    }

    public function getUpdateUrl($entity) {
        return $this->url()->fromRoute('forum/post', array(
                    'action' => 'update', 'id' => $entity->getId()
        ));
    }

}