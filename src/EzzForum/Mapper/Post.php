<?php

namespace EzzForum\Mapper;

use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;

class Post {

    protected $dbAdapter;
    protected $options;
    protected $isInitialized = false;

    /**
     * @see ServiceManager in Module.php
     * @param type $dbAdapter
     * @param \EzzForum\Mapper\PostDbAdapterMapperOptions $options
     */
    public function __construct($dbAdapter, \EzzForum\Mapper\PostDbAdapterMapperOptions $options) {
        $this->setDbAdapter($dbAdapter);
        $this->setOptions($options);
    }

    protected function initialize() {
        if ($this->isInitialized) {
            return;
        }

        if (!$this->dbAdapter instanceof Adapter) {
            throw new \Exception('No db adapter');
        }

        if (!is_object($this->getOptions()->getEntityPrototype())) {
            throw new \Exception('No entity prototype set');
        }

        $this->isInitialized = true;
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
        $id = $this->insert($entity);
        var_dump($id);
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
        $lastInsertValue = $this->getDbAdapter()->getDriver()->getConnection()->getLastGeneratedValue();

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
