<?php
use App\Helpers\Connection;
use App\Helpers\Session;
use App\HTML\Form;
use App\Model\User;
use App\Table\UserTable;

$error = null;
$user = new User;

if(!empty($_POST)) {
    $pdo = Connection::getPDO();
    $table = new UserTable($pdo);
    if(isset($_POST['name'])) {
        $user->setName($_POST['name']);
        try {
            $u = $table->findByUsername($_POST['name']);
            if(isset($_POST['password'])) {
                if(password_verify($_POST['password'], $u->getPassword())){
                    Session::Session_start();
                    $_SESSION['auth'] = $u->getId();
                    header('Location:' . $router->url('admin_post'));
                } else {
                    $error = 'identifiant ou mot de passe invalide';
                }
            }
        } catch(Exception $e) {
            $error = 'identifiant ou mot de passe invalide';
        }
    }
}
$form = new Form($user, []);
?>
<main class="main">
    <div class="main-content">
        <?php if($error): ?>
            <div class="alert alert-danger" style="margin-left: 5%; margin-top: 8%;">
                <?= $error ?>
            </div>
        <?php endif ?>
        <h1 class="main-title big" style="<?= $error  ? 'margin-top: 0;' : ''?> margin-bottom: 2%;">Se connecter</h1>
        <?php if(isset($_GET['failed'])): ?>
            <div class="alert alert-danger" style="margin-left: 5%;">
                Vous n'avez pas accès à cette page
            </div>
        <?php endif ?>
        <?php if(isset($_GET['logout'])): ?>
            <div class="alert alert-success" style="margin-left: 5%;">
                Vous vous êtes bien déconnecter
            </div>
        <?php endif ?>
    </div>
    <form action="<?= $router->url('login') ?>" method="post">
        <?= $form->input("Nom d'utilisateur", 'name')?>
        <?= $form->input("Mot de passe", 'password', 'password')?>
        <div class="form-group">
            <button type="submit" class="button ">Se connecter</button>
        </div>
    </form>
</main>