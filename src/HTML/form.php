<?php
namespace App\HTML;

use App\Model\Post;

class Form {

    private $data;
    private $errors;

    public function __construct($data, array $errors)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input(string $label, string $key, string $type = 'text', bool $want_value = true)
    {
        $type = strtolower($type);
        if($want_value === true) {
            $value = $this->getValue($key);
        } else {
            $value = '';
        }
        return <<<HTML
        <div class="form-group">
            <label for="{$key}-id">$label</label>
            <input type="{$type}" class="{$this->getInputClass($key)}" autocomplete="off" name="$key" id="{$key}-id" value="{$value}">
            {$this->getInvalidFeedback($key)}
        </div>
        HTML;
    }

    public function file(string $label, string $key)
    {
        return <<<HTML
        <div class="form-group">
            <label for="{$key}-id">$label</label>
            <input type="file" class="{$this->getInputClass($key)}" autocomplete="off" name="$key" id="{$key}-id">
            {$this->getInvalidFeedback($key)}
        </div>
        HTML;
    }

    
    public function textarea(string $label, string $key, bool $want_value = true)
    {
        if($want_value === true) {
            $value = $this->getValue($key);
        } else {
            $value = '';
        }
        return <<<HTML
        <div class="form-group">
            <label for="{$key}-id">$label</label>
            <textarea class="{$this->getInputClass($key)}" name="$key" id="{$key}-id" rows="15">{$value}</textarea>
            {$this->getInvalidFeedback($key)}  
        </div>
        HTML;
    }

    public function select(string $label, string $key, array $options, Post $post)
    {

        $value = $this->getValue($key);
        $optionsArray = [];
        foreach ($options as $k => $option){
            $selected = in_array($k, $value) ? 'selected' : '';
            $optionsArray[] = "<option value=\"{$k}\" $selected >" . $option . '</option>';
        }
        $optionHTML = implode('<br>', $optionsArray);
        return <<<HTML
        <div class="form-group">
            <label for="{$key}-id">$label</label>
            <select class="{$this->getInputClass($key)}" name="{$key}[]" id="{$key}-id" rows="15" multiple>
                $optionHTML
            </select>
        </div>
        HTML;
    }

    private function getValue(string $key)
    {
        if(is_array($this->data)) {
            return $this->data[$key];
        }
        $method = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        return $this->data->$method();
    }

    private function getInputClass(string $key)
    {
        $inputClass = 'form-control';
        if(isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
        }
        return $inputClass;
    }

    private function getInvalidFeedback(string $key)
    {
        $InvalidFeedback = null;
        if(isset($this->errors[$key])) {
            $invalidErrors = [];
            foreach($this->errors as $error) {
                $InvalidFeedback = '<div class="invalid-feedback">'. implode('<br>', $error) . '</div>'; 
            } 
        }
        return $InvalidFeedback;
    }

}