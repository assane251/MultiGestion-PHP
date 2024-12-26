<?php

class Database
{
    private static $instance = null;
    public $db;
    private $serveur = "localhost";
    private $port = "5432";
    private $user = "postgres";
    private $pwd = "Assane45678";
    private $dbname = "db-php-v2";
    private $dsn;
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];


    function __construct()
    {
        $this->dsn = "pgsql:host=" . $this->serveur . ";port=" . $this->port . ";dbname=" . $this->dbname;
        $this->db = new PDO($this->dsn, $this->user, $this->pwd, $this->options);
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance->db;
    }
}