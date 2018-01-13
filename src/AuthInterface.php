<?php

namespace Akhilani\Reg;

/**
 * Interface AuthInterface
 * @package Akhilani\Reg
 */
interface AuthInterface
{
    public function login($email, $password);
    public function logout();
    public function getSession($var);
    public function setSession($var, $value);
}