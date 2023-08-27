<?php
namespace App\Validators;

use App\Table\PostTable;

class PostValidator extends Validator{

    public function __construct($data, PostTable $PostTable, array $CategoryByids, ?int $id = null)
    {
        parent::__construct($data);
        $this->v->rule('required', ['name', 'slug', 'content', 'category_ids']);
        $this->v->rule('lengthBetween', 'name', 5, 200);
        $this->v->rule('lengthBetween',  'slug', 5, 200);
        $this->v->rule('lengthBetween', 'content', 15, 65000);
        $this->v->rule('image', 'image');
        if($id !== null) {
            $this->v->rule(function($label, $value) use($PostTable, $id) {
                return !(($PostTable->exist($label, $value, $id)));
            }, ['name', 'slug'], 'Cette valeur est déja utilisée');
        }
        $this->v->rule('subset', 'category_ids', array_keys($CategoryByids));
    }
}