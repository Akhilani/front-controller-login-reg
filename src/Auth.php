<?php

namespace Akhilani\Reg;

use Akhilani\Reg\Database;

/**
 * Class Auth
 * @package Akhilani\Reg
 */
class Auth implements AuthInterface
{
    public $conn;
    public function __construct(Database $db)
    {
        $this->conn = $db->connect();
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password)
    {
        $user = $this->getUserByCredentials($email, $password);
        if($user['email'] === $email){
            $this->setSession('user', $user);
            return true;
        } else {
            throw new Exception('Login failed');
        }
    }

    /**
     * @param $email
     * @param $password
     * @return mixed
     */
    protected function getUserByCredentials($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=? AND password=password(?)");
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->bindValue(2, $password, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return bool
     */
    public function logout(){
        if($this->getSession('user')){
            if (!session_id()){ session_start(); }
            session_unset();
            session_destroy();
            session_write_close();
            setcookie(session_name(),'',0,'/');
        }
        return true;
    }

    /**
     * @param $var
     * @return null
     */
    public function getSession($var)
    {
        if (!session_id()){ session_start(); }
        return isset($_SESSION[$var]) ? $_SESSION[$var] : null;
    }

    /**
     * @param $var
     * @param $value
     * @return mixed
     */
    public function setSession($var, $value)
    {
        if (!session_id()){ session_start(); }
        return $_SESSION[$var] = $value;
    }
}