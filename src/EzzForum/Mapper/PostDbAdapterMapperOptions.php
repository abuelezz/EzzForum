<?php

namespace EzzForum\Mapper;

use Zend\Stdlib\AbstractOptions;

class PostDbAdapterMapperOptions extends AbstractOptions {

    protected $hydrator;
    protected $tableName;
    protected $entityPrototype;

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

    public function getEntityPrototype() {
        return $this->entityPrototype;
    }

    public function setentityPrototype($entityPrototype) {
        $this->entityPrototype = $entityPrototype;
    }

}