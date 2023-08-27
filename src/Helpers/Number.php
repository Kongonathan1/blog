<?php
namespace App\Helpers;

use Exception;

class Number {

    private static function FilterInt(string $param, int $default)
    {
        $currentPage = (int)($_GET[$param] ?? $default);
        if(isset($_GET[$param])) {
            if(!filter_var($_GET[$param], FILTER_VALIDATE_INT)) {
                throw new Exception('Le numéro de la n\'est pas un entier');   
            }
        }   
        return $currentPage;

    }

    public static function GETPositiveInt(string $param, int $default)
    {
        $result = self::FilterInt($param, $default);
        if($result <= 0) {
            throw new Exception('Le numéro de la page n\'est un entier positif');
        } 
        return $result;
    }

}