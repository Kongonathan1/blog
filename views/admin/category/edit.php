<?php
use App\Helpers\Connection;
use App\Helpers\Objet;
use App\HTML\Form;
use App\Model\Category;
use App\Table\CategoryTable;
use App\Validators\CategoryValidator;

$id =(int)$params['id'];
$router->template = 'admin/template/html';

$pdo = Connection::getPDO();
$categoryTable = new CategoryTable($pdo);
/** @var Category */
$category = $categoryTable->find($id);
$success = false;
$errors = [];

if(!empty($_POST)) {
    $v = new CategoryValidator($_POST, $categoryTable, $id);
    Objet::HydrateSetters($_POST, $category, ['name', 'slug']);
    if($v->validate()) {
        $categoryTable->update($category);
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
            Catégorie mise à jour
        </div>
    <?php endif ?>
    <?php  if(!empty($errors)): ?>
        <div class="alert alert-danger">
            Echec de la mise à jour
        </div>
    <?php endif ?>
    <h1 class="main-title">Editer l'article: <?= $category->getName() ?></h1>
    <a href="<?= $router->url('admin_category') ?> " class="link">Revenir au listing des catégories</a>
    <br><br>
    <?php require 'form.php' ?>
</main>
<?php
