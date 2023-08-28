
    <form action="" method="post">
        <?= $form->input('Titre', 'name') ?>
        <?= $form->input('Slug', 'slug') ?>
        <button type="submit" class="button">
            <?php if(isset($params['id'])): ?>
                Modifier
            <?php else: ?>
                Créer
            <?php endif ?>
        </button>
    </form>