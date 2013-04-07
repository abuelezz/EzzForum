<?php

namespace EzzForum\Mapper;

use Zend\Stdlib\AbstractOptions;

class PostDbAdapterMapperOptions extends AbstractOptions {

    protected $tableName;

    public function getHydrator() {
        return $this->hydrator;
    }

    public function setHydrator($hydrator) {
        $this->hydrator = $hydrator;
    }
}