<?php 

namespace App\Helpers;

use PDO;

class Connection{

    private static $pdo;

    public static function getPDO()
    {
        if(!isset(self::$pdo)) {
            self::$pdo = new PDO('mysql:host=localhost;dbname=blog;', 'root', null, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]); 
        }
        return self::$pdo;
    }

}