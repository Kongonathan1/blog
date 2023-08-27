<?php
namespace App\Model;

class User {

    private $id;
    private $name;
    private $password;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id):self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
 
    public function setName(?string $name = null):self
    {
        $this->name = $name;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password = null): self
    {
        $this->password = $password;

        return $this;
    }
}