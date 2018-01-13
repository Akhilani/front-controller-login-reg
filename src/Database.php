<?php

namespace Akhilani\Reg;

class Database implements DatabaseInterface
{
    public $user = 'testUser';
    public $pass = 'testPassword';
    public $host = 'localhost';
    public $db = 'testDatabase';
    public $charset = 'utf8';

    /**
     * Database constructor.
     * @param array $options
     */
    public function __construct( array $options = array())
    {
        $this->user = $options['user'] ?? $this->user;
        $this->pass = $options['pass'] ?? $this->pass;
        $this->host = $options['host'] ?? $this->host;
        $this->db = $options['db'] ?? $this->db;
        $this->charset = $options['charset'] ?? $this->charset;
    }

    /**
     * @return PDO
     */
    public function connect()
    {
        try{
            $conn = new PDO("mysql:host=$this->host;dbname=$this->db;charset=$this->charset", $this->user, $this->pass);
        } catch (\PDOException $e){
            die($e->getMessage());
        }
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}