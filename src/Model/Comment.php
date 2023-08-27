<?php
namespace App\Model;

use DateTime;

class Comment {

    private $id;
    private $username;
    private $content;
    private $created_at;
    private $post_id;

    public function getId():?int
    {
        return $this->id;
    }

    public function setId($id):self
    {
        $this->id = $id;

        return $this;
    }

    public function getUsername():?string
    {
        return $this->username;
    }

    function setUsername($username):self
    {
        $this->username = $username;

        return $this;
    }

    public function getContent():?string
    {
        return $this->content;
    }

    public function setContent($content):self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt()
    {
        return new DateTime($this->created_at);
    }

    public function getPostId():?int
    {
        return $this->post_id;
    }

    public function setPostId($post_id):self
    {
        $this->post_id = $post_id;

        return $this;
    }
}