<?php

/**
 * Created by PhpStorm.
 * User: volkeee
 * Date: 7/4/17
 * Time: 8:27 PM
 */
class Database
{
    private $dbName = 'games-lib-db' ;
    private $dbHost = 'localhost' ;
    private $dbUsername = 'root';
    private $dbUserPassword = '260497+260497';

    public $connection  = null;

    public function __construct() {
        try {
            $this->connection = new PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUsername,
                $this->dbUserPassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}