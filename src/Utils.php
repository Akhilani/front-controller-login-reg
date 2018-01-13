<?php

namespace Akhilani\Reg;

/**
 * Trait Utils
 * @package Akhilani\Reg
 */
trait Utils
{
    /**
     * @param $location
     */
    public static function redirect($location){
        header('Location:'.$location);
    }

    /**
     * @param string $layout
     * @param string $content
     */
    public static function template(string $layout = '/block/layout.php', string $content = 'notLoggedIn.php'){
        require_once $layout;
    }
}