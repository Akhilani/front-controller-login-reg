<?php

namespace Akhilani\Reg;


trait Utils
{
    public static function redirect($location){
        header('Location:'.$location);
    }

    public static function template(string $layout = '/block/layout.php', string $content = 'notLoggedIn.php'){
        require_once $layout;
    }
}