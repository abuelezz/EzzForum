<?php

/**
 * Service class for post 
 * 
 * @author Mohammad Abuelezz <mohammad@abuelezz.com>
 */

namespace ezzModule\Service;

use EzzForum\Mapper\Post;

class Post {

    protected $mapper;

    public function getPaginator();

    public function persist($data);

    public function setMapper(Post $mapper) {
        $this->mapper = $mapper;
    }

    public function getMapper() {
        return $this->mapper;
    }

}