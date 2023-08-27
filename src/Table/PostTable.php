<?php
namespace App\Table;

use App\Model\Post;
use Exception;

final class PostTable extends Table{

    protected $class = Post::class;
    protected $tableName = 'posts';

    /**
     * update
     *
     * @param  mixed $data
     * @return void
     * @throws Exception if update failed
     */
    public function update(Post $post)
    {
        $prepare= $this->pdo->prepare("UPDATE {$this->tableName} SET name = :name, slug = :slug, content = :content, image = :image WHERE id = {$post->getID()}");
        $status = $prepare->execute([
            'name' => $post->getName(),
            'slug' => $post->getSlug(),
            'content' => $post->getContent(),
            'image' => $post->getImage()
        ]);
        if($status === false) {
            throw new Exception("La mise à jour de l'article à échouer");
        }
    }

    public function attachCategories($id, ?array $categories)
    {
        $this->pdo->exec("DELETE FROM categories_posts WHERE post_id = {$id}");
        $prepare = $this->pdo->prepare("INSERT INTO categories_posts SET post_id= ?, category_id = ?");
        if($categories !== null) {
            foreach($categories as $category) {
                $prepare->execute([$id, $category]);
            }
        }
    }

    public function add(Post $post)
    {
        $prepare= $this->pdo->prepare("INSERT INTO {$this->tableName} SET name= :name, slug= :slug, content= :content, created_at= :created_at, image = :image");
        $status = $prepare->execute([
            'name' => $post->getName(),
            'slug' => $post->getSlug(),
            'content' => $post->getContent(),
            'created_at' => date('Y-m-d H:i:s'),
            'image' => $post->getImage()
        ]);
        if($status === false) {
            throw new Exception("La mise à jour de l'article à échouer");
        }
    }


}    
