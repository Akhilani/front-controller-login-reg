<?php

namespace Akhilani\Reg;

interface AuthInterface
{
    public function login($email, $password);
    public function logout();
    public function getSession($var);
    public function setSession($var);
}