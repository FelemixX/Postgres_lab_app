<?php

class Database
{
    protected $dbHost;
    protected $dbName;
    protected $dbUser;
    protected $dbPass;

    public function __construct()
    {
        $config = require_once "config/config.php";
        if ($config) {
            $this->dbHost = $config['db_host'];
            $this->dbName = $config['db_name'];
            $this->dbUser = $config['db_user'];
            $this->dbPass = $config['db_pass'];
        }
    }

    public function getConnection()
    {
        $conn = null;
        try {
            $conn = new PDO("pgsql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUser, $this->dbPass);
        } catch (PDOException $exception) {
            echo "Ошибка подключения к БД!: " . $exception->getMessage();
        }
        return $conn;
    }
}