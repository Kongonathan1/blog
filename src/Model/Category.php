<?php 
namespace App\Model;

class Category {

    private $id;
    private $name;
    private $slug;
    private $post_id;

    public function getId():?int
    {
        return $this->id;
    }

    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }

    public function getName():?string
    {
        return $this->name;
    }

    public function setName($name):self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug():?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug):self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPostId()
    {
        return $this->post_id;
    }

    public function setPostId(int $post_id):self
    {
        $this->post_id = $post_id;

        return $this;
    }
}