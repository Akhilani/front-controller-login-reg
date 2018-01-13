<?php

namespace Akhilani\Reg;


class Router implements RouterInterface
{

    protected $class = 'Index';
    protected $method = 'index';
    protected $params = array();

    public function __construct()
    {
        if (isset($_GET["controller"])) {
            $this->setController($_GET["controller"]);
        }
        if (isset($_GET["action"])) {
            $this->setAction($_GET["action"]);
        }
        if (isset($_GET["params"])) {
            $this->setParams($_GET["params"]);
        }
    }

    public function setClass($class){
        $class = ucfirst(strtolower($class));
        if (!class_exists($class)) {
            throw new InvalidArgumentException('Class '.$class.' not found');
        }
        $this->class = $class;
        return $this;
    }
    public function setMethod($method){
        $reflector = new ReflectionClass($this->class);
        if (!$reflector->hasMethod($method)) {
            throw new InvalidArgumentException('Method '.$method,' not found in class '.$this->class);
        }
        $this->method = $method;
        return $this;
    }
    public function setParams(array $params){
        $this->params = $params;
        return $this;
    }
    public function run(){
        call_user_func_array(array(new $this->class, $this->method), $this->params);
    }
}