<?php

namespace App\Model;

use App\Helpers\Text;
use DateTime;

class Post {

    private $id;
    private $name;
    private $slug;
    private $content;
    private $created_at;
    private $categories = [];
    private $category_ids = [];
    private $image;
    private $oldimage;
    private $verify = false;

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

    public function getContent():?string
    {
        return$this->content;
    }

    public function getFormattedContent():string
    {
        return Text::getFormattedContent($this->content);
    }

    public function setContent(string $content):self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt()
    {
        return new DateTime($this->created_at);
    }

    
    /**
     * AddCategories
     *
     * @param  mixed $category
     * @return Category[]
     */
    public function AddCategories(Category $category)
    {
        $this->categories[] = $category;
    }
    
    /**
     * getCategories
     *
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }
/*
    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }
*/

    public function getCategoryIds()
    {
        foreach($this->categories as $category){
            $this->category_ids[] = $category->getId();
        }
        return $this->category_ids;
    }
/*
    public function setCategoryId($category_id):self
    {
        $this->category_id = $category_id;

        return $this;
    }
    */

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage($image):self
    {
        if(is_array($image) && !empty($image['tmp_name'])) {
            if(!empty($this->image)) {
                $this->oldimage = $this->image;
            }
            $this->verify = true;
            $this->image = $image['tmp_name'];
        }
        if(is_string($image) && !empty($image)) {
            $this->image = $image;
        }
        return $this;
    }

    public function getOldImage(): ?string
    {
        return $this->oldimage;
    }

    public function MustUpload(): bool
    {
        return $this->verify;
    }

    public function getResizeImage(string $width = '300px')
    {
       return <<<HTML
        <img src="/uploads/posts/{$this->getImage()}" alt="" width="{$width}" height="auto">
        HTML;
    }
}