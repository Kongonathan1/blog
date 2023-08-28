<?php
use App\Helpers\Connection;
use App\Model\Post;
use App\Model\Category;
use App\Table\CategoryTable;
use App\URL\PaginatedQuery;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();

//Récupération de la catégorie par laquelle on veut filtrer les articles
$query = $pdo->prepare("SELECT * FROM categories  WHERE id = ? ORDER BY name");
$query->execute([$id]);
$query->setFetchMode(PDO::FETCH_CLASS, Category::class);
/** @var Category|false */
$category = $query->fetch();
if($category === false) {
    throw new Exception("Aucun n'enregistrement ne correspond");
}
if($slug !== $category->getSlug()) {
    header('Location:' . $router->url('category', ['slug' => $category->getSlug(), 'id' => $category->getId()]));
    http_response_code(301);
}

//Initiatialisation pour les requêtes paginées
$CategoryTable = new CategoryTable($pdo);

[$posts, $pagination] = $CategoryTable->findFilterArticleByCategory($id);

$CategoryTable->TakeAndShowCategoriesOfPost($posts);

?>

<?php  require 'C:\wamp\www\Blog\views\template\banner.php' ?>
<main class="main">
    <div class="main-content">
        <h1 class="main-title">Les articles de la catégorie <?= $category->getName() ?></h1>
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

       