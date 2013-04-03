<?php

namespace EzzForum\Mapper;

class Post {

    protected $dbAdapter;
    protected $options;

    /**
     * @see ServiceManager in Module.php
     * @param type $dbAdapter
     * @param \EzzForum\Mapper\PostDbAdapterMapperOptions $options
     */
    public function __construct($dbAdapter, \EzzForum\Mapper\PostDbAdapterMapperOptions $options) {
        $this->setDbAdapter($dbAdapter);
    }

    public function setDbAdapter($adapter) {
        $this->dbAdapter = $adapter;
    }

    public function getDbAdapter() {
        return $this->dbAdapter;
    }

    /**
     * save or update data
     * @todo check to save or update
     * @param type $entity
     */
    public function persist($entity) {
        $this->insert($entity);
    }

    /**
     * @todo add select query
     * @return \Zend\Paginator\Adapter\DbSelect
     */
    public function getPaginatorAdapter() {
        return new \Zend\Paginator\Adapter\DbSelect($select, $this->getDbAdapter());
    }

    protected function insert($entity) {

        $hydrator = $this->getHydrator();
        $set = $hydrator->extract($entity);

        $sql = new Sql($this->getDbAdapter(), $this->getTableName());
        $insert = $sql->insert();
        $insert->values($set);

        $statement = $sql->prepareStatementForSqlObject($insert);
        $result = $statement->execute();
        $lastInsertValue = $this->getWriteDbAdapter()->getDriver()->getConnection()->getLastGeneratedValue();

        return $lastInsertValue;
    }

    protected function setOptions($options) {
        $this->options = $options;
    }

    protected function getOptions() {
        return $this->options;
    }

    protected function getHydrator() {
        return $this->getOptions()->getHydrator();
    }

    protected function getTableName() {
        return $this->getOptions()->getTableName();
    }

    protected function setTableName($tableName) {
        $this->tableName = $tableName;
    }

}
