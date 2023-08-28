<?php

use App\Attachement\PostAttachement;
use App\Helpers\Connection;
use App\Helpers\Objet;
use App\HTML\Form;
use App\Model\Post;
use App\Table\CategoryTable;
use App\Table\PostTable;
use App\Validators\PostValidator;

$router->template = 'admin/template/html';

$pdo = Connection::getPDO();
$postable = new PostTable($pdo);
$categoryTable = new CategoryTable($pdo);
$categoryWithId = $categoryTable->categoryWithId();

/** @var Post */
$post = new Post;
$success = false;
$errors = [];
if(!empty($_POST)) {
    $data = array_merge($_POST, $_FILES);
    $v = new PostValidator($data, $postable, $categoryWithId);
    Objet::HydrateSetters($data, $post, ['name', 'slug', 'content', 'image']);
    $categories = $_POST['category_ids'];
    if($v->validate()) {
        $pdo->beginTransaction();
        PostAttachement::upload($post);
        $postable->add($post);
        $id = $pdo->lastInsertId();
        $postable->attachCategories($id, $categories);
        $pdo->commit();
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
            Réussite de la création de la l'aricle. Voulez-vous <a class="link" href="<?= $router->url('admin_post_edit', ['id' => (int)$id]) ?>">l'éditer ?</a>
        </div>
    <?php endif ?>
    <?php  if(!empty($errors)): ?>
        <div class="alert alert-danger">
            Echec de la mise à jour
        </div>
    <?php endif ?>
    <h1 class="main-title">Ajouter un nouvel article</h1>
    <a href="<?= $router->url('admin_post') ?> " class="link">Revenir au listing des articles</a>
    <br><br>
    <?php require 'form.php' ?>
</main>
