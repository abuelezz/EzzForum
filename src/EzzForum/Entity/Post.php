<?php

/**
 * Entity class for Post
 * 
 * @author Mohammad Abuelezz <mohammad@abuelezz.com>
 */

namespace EzzForum\Entity;

class Post {

    protected $id;
    protected $body;
    protected $created;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getBody() {
        return $this->body;
    }

    public function setBody($body) {
        $this->body = $body;
    }

}