<?php

namespace Akhilani\Reg;

/**
 * Interface UserInterface
 * @package Akhilani\Reg
 */
interface UserInterface
{
    /**
     * @return mixed
     */
    public function login();

    /**
     * @return mixed
     */
    public function register();
}