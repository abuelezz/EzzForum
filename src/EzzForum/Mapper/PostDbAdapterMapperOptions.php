<?php

namespace EzzForum\Mapper;

use Zend\Stdlib\AbstractOptions;

class PostDbAdapterMapperOptions extends AbstractOptions {

    protected $hydrator;
    protected $tableName;    

    public function getHydrator() {
        return $this->hydrator;
    }

    public function setHydrator($hydrator) {
        $this->hydrator = $hydrator;
    }

    public function getTableName() {
        return $this->tableName;
    }

    public function setTableName($tableName) {
        $this->tableName = $tableName;
    }

}