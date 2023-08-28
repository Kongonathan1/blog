<?php
use App\Helpers\Connection;
use App\HTML\Form;
use App\Model\Category;
use App\Table\CategoryTable;
use App\Validators\CategoryValidator;

$router->template = 'admin/template/html';

$pdo = Connection::getPDO();
$categoryTable = new CategoryTable($pdo);

$category = new Category;
$success = false;
$errors = [];
if(!empty($_POST)) {
    $v = new CategoryValidator($_POST, $categoryTable);
    if($v->validate()) {
        $category->setName($_POST['name']);
        $category->setSlug($_POST['slug']);
        $categoryTable->add($category);
        $success = true;
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($category, $errors);
?>
<main class="main">
    <?php  if($success): ?>
        <div class="alert alert-success">
            Réussite de la création de la catégorie. Voulez-vous <a class="link" href="<?= $router->url('admin_category_edit', ['id' => (int)$pdo->lastInsertId()]) ?>">l'éditer ?</a>
        </div>
    <?php endif ?>
    <?php  if(!empty($errors)): ?>
        <div class="alert alert-danger">
            Echec de la mise à jour
        </div>
    <?php endif ?>
    <h1 class="main-title">Ajouter une catégorie</h1>
    <a href="<?= $router->url('admin_category') ?> " class="link">Revenir au listing des catégories</a>
    <br><br>
    <?php require 'form.php' ?>
</main>
<?php
