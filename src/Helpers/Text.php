<?php
namespace App\Helpers;

class Text {

    public static function getFormattedContent(string $content, int $limit = 120) 
    {
        $content = nl2br(htmlentities($content));
        if(mb_strlen($content) < $limit) {
            return $content;
        } else {
            $offset = mb_strpos($content, ' ', $limit);
            return mb_substr($content,  0, $offset) . '...';
        }
    }

}