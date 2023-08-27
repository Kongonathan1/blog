<?php

namespace App;

use finfo;
use Valitron\Validator as ValitronValidator;

final class RuleValidator extends ValitronValidator {

    public function __construct($data = array(), $fields = array(), $lang = null, $langDir = null)
    {
        parent::__construct($data, $fields, $lang, $langDir);
        self::addRule('image', function($field, $value, array $params, array $fields){
            if($value['size'] === 0) {
                return true;
            }
            $mime = "image/jpeg";
            $finfo = new finfo();
            $info = $finfo->file($_FILES['image']['tmp_name'], FILEINFO_MIME_TYPE);
            return $info === $mime;
        }, "Le fichier chargé n'est pas une image ou n'est pas une image valide");
    }

    protected function checkAndSetLabel($field, $message, $params)
    {
        $message = str_replace('{field}', '', $message);
        if (is_array($params)) {
            $i = 1;
            foreach ($params as $k => $v) {
                $tag = '{field' . $i . '}';
                $label = isset($params[$k]) && (is_numeric($params[$k]) || is_string($params[$k])) && isset($this->_labels[$params[$k]]) ? $this->_labels[$params[$k]] : $tag;
                $message = str_replace($tag, $label, $message);
                $i++;
            }
        }
        return $message;
    }
}