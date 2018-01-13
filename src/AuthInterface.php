<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12-01-2018
 * Time: 10:34
 */

namespace Akhilani\Reg;

interface AuthInterface
{
    public function login($email, $password);
    public function logout();
    public function getSession($var);
    public function setSession($var);

}