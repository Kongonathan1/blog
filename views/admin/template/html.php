<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require 'C:\wamp\www\Blog\views\admin\template\style.php' ?>
    <div class="grid">
        <header class="topbar">
            <nav class="navbar">
                <div class="nav-link">
                    <a href="<?= $router->url('blog') ?>" class="navbar-title">Hermès</a>
                    <a href="">Acceuil</a>
                    <a href="">Articles</a>
                </div>
                <form action="<?= $router->url('logout') ?>" method="post">
                    <button type="submit" class="logout">Déconnexion</button>
                </form>
            </nav>
        </header>
        <aside class="sidebar_admin">
            <h2 class="sidebar_admin_title">Admin Panel</h2>
            <div class="sidebar_admin_content">
                <ul>
                    <a href="<?= $router->url('admin_post') ?>"><li>Articles</li></a>
                    <a href="<?= $router->url('admin_category') ?>"><li>Catégories</li></a>
                </ul>
            </div>
        </aside>
        <?= $content ?>
        <?php if(defined("CHRONO")): ?>
            <footer>
                <p>Page générée en <?= ceil((microtime(true) - CHRONO ) * 1000 )?>ms</p> 
            </footer>
        <?php endif ?>
</body>
</html>