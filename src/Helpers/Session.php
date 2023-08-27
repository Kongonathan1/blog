<?php
namespace App\Helpers;

class Session {

    public static function Session_start()
    {
        if(session_status() === PHP_SESSION_NONE) {
            return session_start();
        }
    }

}