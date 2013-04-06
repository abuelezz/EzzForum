<?php

/**
 * Post controller to handle creation action and index action 
 */

namespace EzzForum\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class PostController extends AbstractActionController {

    protected $postForm;
    protected $entityService;

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

            $service = $this->getEntityService();
            $data = $this->getRequest()->getPost()->toArray();
            $form->setData($data);
            if ($form->isValid()) {
                $values = $form->getInputFilter()->getValues();
                $entity = $service->createEntityFromArray($values);

                $persistEvent = $service->persist($values);


                //$last = $ret->last();
                //if ($last instanceof Response || $last instanceof \Zend\View\Model\ModelInterface) {
                //    return $last;
                //}
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

        $viewModel = new \Zend\View\Model\ViewModel();
        $paginator = $this->getEntityService()->getPaginator();
        $viewModel->setVariables(array(
            'paginator' => $paginator,
        ));

        return $viewModel;
    }

    public function getPostForm() {
        return $this->postForm;
    }

    public function setPostForm($postForm) {
        $this->postForm = $postForm;
    }

    public function getEntityService() {
        return $this->entityService;
    }

    public function setEntityService($entityService) {
        $this->entityService = $entityService;
    }

}