<?php

class Database
{
    protected $dbHost;
    protected $dbPort;
    protected $dbName;
    protected $dbUser;
    protected $dbPass;

    public function __construct()
    {
        $config = include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        if ($config) {
            $this->dbHost = $config['db_host'];
            $this->dbPort = $config['db_port'];
            $this->dbName = $config['db_name'];
            $this->dbUser = $config['db_user'];
            $this->dbPass = $config['db_pass'];
        }
    }

    public function getConnection()
    {
        $conn = null;
        try {
            $conn = pg_connect('host=' . $this->dbHost . ' port=' . $this->dbPort . ' dbname=' . $this->dbName . ' user=' . $this->dbUser . ' password=' . $this->dbPass);
        } catch (Exception $exception) {
            echo 'Ошибка подключения к БД!: ' . $exception->getMessage();
        }

        return $conn;
    }
}