<?php
namespace dao;

abstract class Dao implements IDao
{
    protected  $pdo;
    
    public function __construct()
    {
        $this->pdo = Connection::getMysqlPDO();
    }
}

