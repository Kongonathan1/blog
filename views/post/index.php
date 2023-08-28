<?php
use App\Helpers\Connection;
use App\Table\CategoryTable;
use App\Table\PostTable;

$pdo = Connection::getPDO();
$PostTable = new PostTable($pdo);

[$posts, $pagination] = $PostTable->findAllPaginatedPosts();

(new CategoryTable($pdo))->TakeAndShowCategoriesOfPost($posts);

?>
<?php  require 'C:\wamp\www\Blog\views\template\banner.php' ?>
<main class="main">
    <div class="main-content">
        <h1 class="main-title">Les derniers articles</h1>
        <div class="main-flex">
            <?php foreach($posts as $post): ?>
                <div class="card">
                    <div class="card-body">
                        <div class="card-layout">
                            <h3 class="card-title"><a href=""><?= $post->getName()?></a></h3>
                            <?php foreach($post->getCategories() as $cat): ?>
                                <a href="<?= $router->url('category', ['slug' => $cat->getSlug(), 'id' => $cat->getId()]) ?>" class="button button_category"><?= $cat->getName() ?></a>
                            <?php endforeach ?> 
                        </div>   
                        <?php if($post->getImage()): ?>
                            <?= $post->getResizeImage('300px') ?>
                        <?php endif ?> 
                        <div class="card-layout">
                            <p><?= $post->getFormattedContent()  ?></p>
                            <div class="card-footer">
                                <a href="<?= $router->url('show_article', ['slug' => $post->getSlug(), 'id' => $post->getId()]) ?>">Voir plus</a>
                                <small>Publié le <?= $post->getCreatedAt()->format('d M Y') ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="pagination">
        <?= $pagination->Previous() ?>
        <?= $pagination->goodCSS() ?>
        <?= $pagination->Next() ?>
    </div>
</main>
<?php require 'C:\wamp\www\Blog\views\template\aside.php' ?>