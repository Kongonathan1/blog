<?php
use App\Helpers\Connection;
use App\Model\Category;

$pdo = Connection::getPDO();
$query = $pdo->query("SELECT * FROM categories ORDER BY name");
/** @var Category[] */
$categories = $query->fetchAll(PDO::FETCH_CLASS, Category::class);
?>

<aside class="sidebar">
    <h2 clas="sidebar-title">Catégories</h2>
    <div class="sidebar-content">
        <ul>
            <?php foreach($categories as $category): ?>
                <li><a href="<?= $router->url('category', ['slug' => $category->getSlug(), 'id' => $category->getId()]) ?>"><?= $category->getName() ?></a></li>
            <?php endforeach ?>
            <br>
            <li><a href="<?= $router->url('blog') ?>">Tout</a></li>
        </ul>
    </div>
</aside>