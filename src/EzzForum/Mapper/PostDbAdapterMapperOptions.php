<?php

namespace EzzForum\Mapper;

class PostDbAdapterMapperOptions extends \Zend\Stdlib\AbstractOptions {

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