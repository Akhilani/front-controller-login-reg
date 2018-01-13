<?php

namespace Akhilani\Reg;

use Akhilani\Reg\Utilities;
use Akhilani\Reg\Auth;

/**
 * Class Index
 * @package Akhilani\Reg
 */
class Index
{
    use Utils;
    public function index(){
        $this->template('/block/layout.php', '/block/notLoggedIn.php');
    }

    public function home(){
        $auth = new Auth();
        if ($auth->getSession('user')){
            $this->template('/block/layout.php', '/block/loggedIn.php');
        } else {
            $this->redirect('/?class=index&method=index');
        }
    }
}