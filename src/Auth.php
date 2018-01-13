<?php

namespace Akhilani\Reg;

use Akhilani\Reg\Database;


class Auth implements AuthInterface
{

    public function login($email, $password)
    {
        $user = $this->getUserByCredentials($email, $password);
        if($user['email'] === $email){
            $this->setSession('user', $user);
            return true;
        } else {
            return false;
        }
    }

    protected function getUserByCredentials($email, $password){
        $db = new Database();
        $conn = $db->connect();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=? LIMIT 1");
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->bindValue(2, $password, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

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

    public function getSession($var){
        if (!session_id()){ session_start(); }
        return isset($_SESSION[$var]) ? $_SESSION[$var] : null;
    }

    public function setSession($var, $value){
        if (!session_id()){ session_start(); }
        return $_SESSION[$var] = $value;
    }
}