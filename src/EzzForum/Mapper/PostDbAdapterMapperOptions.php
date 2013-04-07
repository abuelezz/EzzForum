<?php

namespace EzzForum\Mapper;

use Zend\Stdlib\AbstractOptions;

class PostDbAdapterMapperOptions extends AbstractOptions {

    protected $tableName;

    public function getTableName() {
        return $this->tableName;
    }

    public function setTableName($tableName) {
        $this->tableName = $tableName;
    }
}