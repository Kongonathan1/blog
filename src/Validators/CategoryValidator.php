<?php
namespace App\Validators;
use App\Table\CategoryTable;

class CategoryValidator extends Validator{

    public function __construct($data, CategoryTable $categoryTable, ?int $id = null)
    {
        parent::__construct($data);
        $this->v->rule('required', ['name', 'slug']);
        $this->v->rule('lengthBetween', 'name', 1, 200);
        $this->v->rule('lengthBetween',  'slug', 5, 200);
        $this->v->rule(function($label, $value) use($categoryTable, $id) {
            return !($categoryTable->exist($label, $value, $id));
        }, ['name', 'slug'], 'Cette valeur est déja utilisée');
    }
}