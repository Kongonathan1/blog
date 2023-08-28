<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Blog' ?></title>
</head>
<body>
    <?php require 'C:\wamp\www\Blog\views\template\style.php' ?>
    <div class="grid">
        <header class="topbar">
            <nav class="navbar">
                <div class="nav-link">
                    <a class="navbar-title">Hermès</a>
                    <a href="">Acceuil</a>
                    <a href="<?= $router->url('blog') ?>">Blog</a>
                    <a href="<?= $router->url('admin_post') ?>">Admin</a>
                </div>
            </nav>
        </header>
        <?= $content ?>
        <footer class="footer">
            <right class="droite">
                <h1 class="footer_title_principal">Hermès</h1>
                <div class="push">
                    <p>Suivez-nous</p>
                    <?php if(defined("CHRONO")): ?>                  
                        <p>Page générée en <?= ceil((microtime(true) - CHRONO ) * 1000 )?>ms</p> 
                    <?php endif ?>
                    <div class="social">
                        <a href=""><img src="insta.jpg" alt="" height="30" width="30" class="insta"></a>
                        <a href=""><img src="facebook.png" alt="" height="30" width="30" class="face"></a>
                    </div>
                </div>
            </right>
            <main class="main_footer">
                <h2 class="footer-title">Nos Produits</h2>
                <a href="">Glaces</a>
                <a href="">Pâtisseries</a>
                <a href="">Smoothies</a>
                <a href="">Milkshake</a>
                <a href="">Confiseries</a>
            </main>
            <left class="left">
                <h2 class="footer-title">Notre Société</h2>
                <a href="">Nos boutiques</a>
                <a href="">Contactez-nous</a>
                <a href="">La maison</a>
            </left>
        </footer>
    </div>
</body>
</html>