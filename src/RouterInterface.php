<?php

namespace Akhilani\Reg;


interface RouterInterface
{
    public function setClass($class);
    public function setMethod($method);
    public function setParams(array $params);
    public function run();
}