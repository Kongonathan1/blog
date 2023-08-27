<?php 
namespace App\Table;

use App\Model\Category;
use App\Model\Post;
use App\URL\PaginatedQuery;
use Exception;
use PDO;

final class CategoryTable extends Table {

    protected $class = Category::class;
    protected $tableName = 'categories';

    public function findFilterArticleByCategory(int $id)
    {
        $paginatedQuery = new PaginatedQuery(
        "SELECT p.* FROM posts p
        JOIN categories_posts cp ON cp.post_id = p.id
        WHERE cp.category_id = $id
        ORDER BY created_at DESC ", 
        "SELECT COUNT(post_id) FROM categories_posts WHERE category_id = $id",$this->pdo);
        //Récupération des articles filtrer par la catégorie en question
        /** @var Post[]|false */
        $posts = $paginatedQuery->PaginatedResults(Post::class);
        $pagination = $paginatedQuery;
        return [$posts, $pagination];
    }

    /**
     * TakeAndShowCategoriesOfPost
     *
     * @param  Post $posts
     * @return void
     */
    public function TakeAndShowCategoriesOfPost($posts)
    {
        $postById = [];
        foreach($posts as $post) {
            $postBydId[$post->getId()] = $post;
        }
        $ids = implode(', ', array_keys($postBydId));
        
        $sql = "SELECT c.*, cp.post_id FROM categories_posts cp
                JOIN categories c ON c.id = cp.category_id
                WHERE cp.post_id IN ($ids)";
        
        $query = $this->pdo->query($sql);
        /** @var Category[] */
        $categories = $query->fetchAll(PDO::FETCH_CLASS, Category::class);
        foreach($categories as $category) {
            $postBydId[$category->getPostId()]->AddCategories($category);
        }  
    }

    public function update(Category $category)
    {
        $prepare= $this->pdo->prepare("UPDATE {$this->tableName} SET name = :name, slug = :slug WHERE id = {$category->getID()}");
        $status = $prepare->execute([
            'name' => $category->getName(),
            'slug' => $category->getSlug(),
        ]);
        if($status === false) {
            throw new Exception("La mise à jour de l'article à échouer");
        }
    }

    public function add(Category $category)
    {
        $prepare= $this->pdo->prepare("INSERT INTO {$this->tableName} SET name= :name, slug= :slug");
        $status = $prepare->execute([
            'name' => $category->getName(),
            'slug' => $category->getSlug(),
        ]);
        if($status === false) {
            throw new Exception("La mise à jour de l'article à échouer");
        }
    }

    public function categoryWithId()
    {
        $categoriesById = [];
        $query = $this->pdo->query("SELECT * FROM {$this->tableName}");
        /** @var Category[] */
        $categories = $query->fetchAll(PDO::FETCH_CLASS, $this->class);
        foreach($categories as $category){
            $categoriesById[$category->getId()] = $category->getName();
        }
        return $categoriesById;
    }


}
