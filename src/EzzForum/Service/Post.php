<?php

/**
 * Service class for post 
 * 
 * @author Mohammad Abuelezz <mohammad@abuelezz.com>
 */

namespace ezzForum\Service;

//use EzzForum\Mapper\Post;

class Post {

    protected $mapper;
    protected $postForm;
    protected $entityPrototype;
    protected $hydrator;

    public function __construct(\EzzForum\Mapper\Post $mapper, $entityPrototype, \EzzForum\Entity\PostHydrator $hydrator) {
        $this->setMapper($mapper);
        $this->setEntityPrototype($entityPrototype);
        $this->setHydrator($hydrator);
    }

    public function getPaginator() {
        echo __FUNCTION__;
    }

    public function persist($entity, $data = null) {
        if (!is_object($entity)) {
            if (is_array($entity)) {
                $data = $entity;
                $entity = $this->createEntityFromArray($entity);
            } else {
                throw new \Exception("Not an entity");
            }
        }

        $mapper = $this->getMapper();
        $mapper->persist($entity);

        return $event;
    }

    public function setMapper(\EzzForum\Mapper\Post $mapper) {
        $this->mapper = $mapper;
    }

    public function getMapper() {
        return $this->mapper;
    }

    protected function getPostForm() {
        if (null === $this->postForm) {
            $this->postForm = $this->getServiceManager()->get('EzzForum\Form\Post');
        }
        return $this->postForm;
    }

    public function setPostForm(Form $postForm) {
        $this->postForm = $postForm;
        return $this;
    }

    public function getEntityPrototype() {
        return $this->entityPrototype;
    }

    public function setEntityPrototype($entityPrototype) {
        $this->entityPrototype = $entityPrototype;
    }

    public function getHydrator() {
        return $this->hydrator;
    }

    public function setHydrator($hydrator) {
        $this->hydrator = $hydrator;
    }

    public function createEntityInstance() {
        return clone $this->getEntityPrototype();
    }

    public function createEntityFromArray(array $data) {
        $entity = $this->getHydrator()->hydrate($data, $this->createEntityInstance());
        return $entity;
    }

}