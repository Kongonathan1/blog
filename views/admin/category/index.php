<?php

use App\Auth\Auth;
use App\Helpers\Connection;
use App\Table\CategoryTable;

Auth::check();

$router->template = 'admin/template/html';
$pdo = Connection::getPDO();
$categoryTable = new CategoryTable($pdo);

[$categories, $pagination] = $categoryTable->findAllPaginatedPosts();
?>

<main class="main">
    <?php if(isset($_GET['delete'])): ?>
        <div class="alert alert-success">L'article à bien été supprimer</div>
    <?php endif ?>
    <h1 class="main-title">Manager les catégories</h1>
    <a href="<?= $router->url('admin_category_add') ?>" class="button button_add">Ajouter</a>
    <div class="grid_main">
    <table class="table">
        <thead>
            <tr>
                <th>titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category ): ?>
                <tr>
                    <td><a href="" class="link"><?= $category->getName() ?></a></td>
                    <td class="action">
                        <a href="<?= $router->url('admin_category_edit', ['id' => $category->getId()]) ?>" class="button">Editer</a>
                        <form action="<?= $router->url('admin_category_delete', ['id' => $category->getId()]) ?>" onsubmit="return confirm('Êtes vous sûr de vouloir effectuer cette action?')" method="POST">
                            <button type="submit" class="button button_danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
    <div class="pagination">
        <?= $pagination->Previous() ?>
        <?= $pagination->goodCSS() ?>
        <?= $pagination->Next() ?>
    </div>
</main>