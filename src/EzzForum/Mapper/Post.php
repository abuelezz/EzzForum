<?php

namespace EzzForum\Mapper;

use Zend\Db\Adapter;
use EzzForum\Entity\Post;

class Post {

    protected $dbAdapter;

    public function persist(Post $post);

    public function getPaginatorAdapter();

    public function setDbAdapter(Adapter $dbAdapter) {
        $this->dbAdapter = $dbAdapter;
    }

    public function getDbAdapter();
}
