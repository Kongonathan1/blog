
        <main class="main">
            <h1 class="main-title">Les derniers articles</h1>
            <div class="main-flex">
                <?php for($i = 1; $i <= 6; $i++): ?>
                    <?php require 'card.php' ?>
                <?php endfor ?>
            </div>
        </main>