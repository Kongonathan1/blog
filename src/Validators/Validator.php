<?php
namespace App\Validators;

use App\RuleValidator;

class Validator {

    protected $v;

    public function __construct($data)
    {
        RuleValidator::lang('fr');
        $this->v = new RuleValidator($data);
    }

    public function validate()
    {
        return $this->v->validate();
    }

    public function errors()
    {
        return $this->v->errors();
    }
}