<?php
use App\Helpers\Connection;
use App\Helpers\Objet;
use App\HTML\Form;
use App\Model\Post;
use App\Table\CategoryTable;
use App\Table\PostTable;
use App\Validators\PostValidator;

$id =(int)$params['id'];
$router->template = 'admin/template/html';

$pdo = Connection::getPDO();
$postable = new PostTable($pdo);
$categoryTable = new CategoryTable($pdo);
$categoryWithId = $categoryTable->categoryWithId();
/** @var Post */
$post = $postable->find($id);
$categoryTable->TakeAndShowCategoriesOfPost([$post]);
$categoryIds = $post->getCategoryIds();
$success = false;
$errors = [];
if(!empty($_POST)) {
    $v = new PostValidator($_POST, $postable, $categoryWithId, $id);
    Objet::HydrateSetters($_POST, $post, ['name', 'slug', 'content']);
    $categories = $_POST['category_ids'];
    if($v->validate()) {
        $pdo->beginTransaction();
        $postable->update($post);
        $postable->attachCategories($post->getId(), $categories );
        $pdo->commit();
        $categoryTable->TakeAndShowCategoriesOfPost([$post]);
        $success = true;
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($post, $errors);
?>
<main class="main">
    <?php  if($success): ?>
        <div class="alert alert-success">
            Article mis à jour
        </div>
    <?php endif ?>
    <?php  if(!empty($errors)): ?>
        <div class="alert alert-danger">
            Echec de la mise à jour
        </div>
    <?php endif ?>
    <h1 class="main-title">Editer l'article: <?= $post->getName() ?></h1>
    <a href="<?= $router->url('admin_post') ?> " class="link">Revenir au listing des articles</a>
    <br><br>
    <?php require 'form.php' ?>
</main>