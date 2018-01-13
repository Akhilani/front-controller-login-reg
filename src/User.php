<?php

namespace Akhilani\Reg;

use Akhilani\Reg\Auth;
use Akhilani\Reg\Database;
use Akhilani\Reg\Utilities;

class User implements UserInterface
{
    use Utils;
    public function login(){
        if(isset($_POST)){
            $auth = new Auth();
            try{
                $auth->login($_POST['email'], $_POST['password']);
                $this->redirect('/?class=index?method=home');
            } catch (\Exception $e){
                die($e->getMessage());
            }
        } else {
            $this->template('/block/layout.php', '/block/login.php');
        }
    }

    public function register(){
        if(isset($_POST)){
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $db = new Database();
            $conn = $db->connect();
            $stmt = $conn->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES(:fname,:lname,:email,password(:password))");
            $register = $stmt->execute(array(':fname' => $firstName, ':lname' => $lastName, ':email' => $email, ':password' => $password));
            if ($register){
                $this->redirect('/?class=index?method=login');
            } else {
                die('Registration unsuccessful');
            }
        } else {
            $this->template('/block/layout.php', '/block/register.php');
        }
    }
}