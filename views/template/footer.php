
        <footer class="footer">
            <right class="droite">
                <h1 class="footer_title_principal">Hermès</h1>
                <div class="push">
                    <p>Suivez-nous</p>
                    <?php if(defined(CHRONO)): ?>
                     <p>Page générée en <?= ceil((microtime(true) - CHRONO ) * 1000 )?>ms</p> 
                    <?php endif ?>
                    <div class="social">
                       <img src="facebook.png" alt="" height="30" width="30" class="insta">
                        <img src="insta.jpg" alt="" height="30" width="30" class="face">
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

<?php /*
</body>
<footer>
        <form action="" method="get">
            <select name="theme" id="">
            <?php foreach($themes as $theme): ?>
                <option value="<?= $theme ?>"><?= $theme ?></option>
            <?php endforeach ?>
            </select>
            <button type="submit" class="btn">OK</button>
        </form>
</footer>
</html>
*/