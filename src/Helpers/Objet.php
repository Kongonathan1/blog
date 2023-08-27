<?php
namespace App\Helpers;

class Objet {

    public static function HydrateSetters(array $data,  $objet ,array $fieldNames)
    {
        foreach($fieldNames as $name) {
            $method = 'set' . ucfirst($name);
            $objet->$method($data[$name]);
        }
    }

}