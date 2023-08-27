<?php
namespace App\Validators;

class CommentValidator extends Validator{

    public function __construct($data)
    {
        parent::__construct($data);
        $this->v->rule('required', ['username', 'content']);
        $this->v->rule('lengthBetween', 'username', 5, 200);
        $this->v->rule('lengthBetween', 'content', 3, 65000);
    }
}