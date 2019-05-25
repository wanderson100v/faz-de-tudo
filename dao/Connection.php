<?php
namespace dao;

use PDO;
use PDOException;

class Connection{
    private static $mysqlPDO;

    public static function getMysqlPDO() : \PDO{
        if(Connection::$mysqlPDO == null){
            try {
                Connection::$mysqlPDO = new PDO('mysql:host=localhost;dbname=fdt',"root","");
                Connection::$mysqlPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
            }
        }
        return Connection::$mysqlPDO;
    }

    public static function closeConnect(){
        Connection::$mysqlPDO->close();
    }
}
