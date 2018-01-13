<?php

namespace Akhilani\Reg;

/**
 * Interface RouterInterface
 * @package Akhilani\Reg
 */
interface RouterInterface
{
    /**
     * @param $class
     * @return mixed
     */
    public function setClass($class);

    /**
     * @param $method
     * @return mixed
     */
    public function setMethod($method);

    /**
     * @param array $params
     * @return mixed
     */
    public function setParams(array $params);

    public function run();
}