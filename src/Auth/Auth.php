<?php 
namespace App\Auth;

use App\Exception\Security\FailedException;
use App\Helpers\Session;

class Auth {

    public static function check()
    {
        Session::Session_start();
        if(!isset($_SESSION['auth'])) {
            throw new FailedException();
        }
    }

}