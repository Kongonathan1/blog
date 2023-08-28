<?php
use App\Helpers\Connection;
use App\Helpers\Objet;
use App\HTML\Form;
use App\Model\Comment;
use App\Model\Post;
use App\Table\CategoryTable;
use App\Table\CommentTable;
use App\Table\PostTable;
use App\Validators\CommentValidator;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$PostTable = new PostTable($pdo);
/** @var Post */
$post = $PostTable->find($id);
if($post === false) {
    throw new Exception("Aucun enregistrment ne correspond à l'id #$id");
}

if($slug !== $post->getSlug()) {
    header('Location:' . $router->url('show_article', ['slug' => $post->getSlug(), 'id' => $post->getId()]));
    http_response_code(301);
}

$categoryTable = new CategoryTable($pdo);
$categoryTable->TakeAndShowCategoriesOfPost([$post]);

/** Gestion des Commentaires */
$comment = new Comment;
$CommentTable = new CommentTable($pdo);

$errors = [];
if(!empty($_POST)) {
    $v = new CommentValidator($_POST);
    Objet::HydrateSetters($_POST, $comment, ['username', 'content']);
    if($v->validate()) {
        $CommentTable->add($comment, $id);
    } else {
        $errors = $v->errors();
    }
}
/** @var Comment[] */
$comments = $CommentTable->take($id);
$count = $CommentTable->count($id);

$form = new Form($comment, $errors);

$title = $post->getName();
$banner_title = "Découvrez <<{$post->getName()}>>";
?>

<main class="main main-show">
    <div class="center">
        <h1 class="main-title"><?= $post->getName() ?></h1>
    </div>
    <?php foreach($post->getCategories() as $category): ?>
        <a href="<?= $router->url('category', ['slug' => $category->getSlug(), 'id' => $category->getId()]) ?>" class="button button_category"><?= $category->getName()?></a>
    <?php endforeach ?>
    <p>
     <?php if($post->getImage()): ?>
        <?= $post->getResizeImage('100%') ?>
    <?php endif ?> 
    </p>
    <p>
        <?= nl2br($post->getContent()) ?>
    </p>
    <div class="card-footer">
    <small>Publié le <?= $post->getCreatedAt()->format('d M Y') ?></small>
    </div><br><br>
    <h1>Laissez un commentaire</h1>
    <div class="container">
        <form action="" method="post">
            <?= $form->input('Votre pseudo', 'username', 'text', false) ?>
            <?= $form->textarea('Votre comentaire', 'content', false) ?>
            <button type="submit" class="button">Envoyer</button>
        </form>
    </div>
    <h2 style="margin-left: 0;"><?= $count ?> Commentaire<?= $count > 1 ? 's' : '' ?></h2>
    <?php if($comments): ?>
        <ul>
            <?php foreach($comments as $comment): ?>                   
                <li>
                    <h3 class="no_margin"><?= $comment->getUsername()?></h3>
                    <p><?= $comment->getContent() ?></p>
                    <div class="card-footer">
                        <small><?= $comment->getCreatedAt()->format('d M Y') ?></small>
                    </div>
                </li>
                <br><br>
            <?php endforeach ?>
        </ul>
    <?php  endif ?>
</main>
<?php require 'C:\wamp\www\Blog\views\template\aside.php'  ?>