
    <form action="" method="post" enctype="multipart/form-data">
        <?= $form->input('Titre', 'name') ?>
        <?= $form->input('Slug', 'slug') ?>
        <?php if($post->getImage()): ?>
            <?= $post->getResizeImage('300px') ?>
        <?php endif ?>
        <?= $form->file('Image à la une' ,'image') ?>
        <?= $form->select('Catégories', 'category_ids', $categoryWithId, $post) ?>
        <?= $form->textarea('Contenu', 'content') ?>
        <button type="submit" class="button">
            <?php if(isset($params['id'])): ?>
                Modifier
            <?php else: ?>
                Créer
            <?php endif ?>
        </button>
    </form>