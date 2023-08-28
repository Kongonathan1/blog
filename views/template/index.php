<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <style>
            html {
            --theme: rgb(91, 213, 210);
            --theme-ecriture:  rgb(86, 86, 86);
            --background-theme: rgb(241, 241, 241);
            }


            body {
                margin: 0;
                font-family: 'Lucida Fax';
                line-height: 1.4;
                background-color: var(--background-theme);
                transition: all .5s;
            }
            a {
                text-decoration: none;
                color: inherit;
            }
            .topbar {
                display: block;
                background-color: var(--theme);
                padding: 15px 12px;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.36);
                z-index: 1;
                grid-column-start: 1;
                grid-column-end: 3;
            }

            .grid {
                display: grid;
                grid-template-columns: 1fr 225px;
            }


            .navbar {
                display: flex;
                justify-content: space-between;
                color: azure;
            }
            .nav-link {
                display: flex;
                justify-content: space-between;
                margin-left: 22px;
            }
            .navbar a {
                padding: 8px 6px;
                transition: all .4s;
                margin-left: 10%;
            }
            .navbar-title {
                display: inline-block;
                font-family: 'Castellar';
                font-size: 18px;
                margin-right: 12%;
            }
            .navbar-title:hover {
                scale: 1;
            }
            .navbar a:hover {
                color: var(--theme-ecriture);
            }
            .navbar .logout {
                background-color: var(--background-theme);
                padding: 8px 12px;
                color: var(--theme);
                border-radius: 5px;
                margin-right: 5%;
                transition: .6s;
            }
            .navbar .logout:hover {
                background-color: var(--theme);
                color: azure;
            }


            .banner {
                display: flex;
                flex-direction: column;
                justify-content: center;
                margin-top: 0;
                background-color: rgba(192, 192, 192, 0.61);
                padding: 0 40px;
                height: 450px;
                color: black;
                grid-column-start: 1;
                grid-column-end: 3;
            }
            .banner-title {
                margin: 22px 0;
            }
            .banner p {
                margin: 0;
                width: 850px;
            }


            .main {
                background-color:  rgb(241, 241, 241);
                box-shadow: 0 30px rgba(0, 0, 0, 0.5);
            }


            /* grkergr ,j tjtjthjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj*/



            body {
                margin: 0;
            }


            .header {
                grid-column-start: 1;
                grid-column-end: 3;
                height: 80px;
                box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.36);
                background-color: var(--theme);
                padding: 15px 12px;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1;
            }



            .banner {
                height: 450px;
                grid-column-start: 1;
                grid-column-end: 3;
            }

            .footer {
                grid-column-start: 1;
                grid-column-end: 3;
                background-color: bisque;
                padding: 20px 0;
                padding-left:  35%;
            }


            /*------------------------------------------------------------------------------------------------------------*/

            .sidebar {
                background-color: azure;
                padding-left: 25px;
            }
            .main-flex{
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;
            }
            .main{
                text-align: center;
            }
            .main-title {
                margin-bottom: 35px;
            }
            .card {
                width: 250px;
                margin-left: 10px;
                margin-bottom: 25px;
            }
            .card img {
                width: 250px;
                height: auto;
                transform: translateY(7px);
                z-index: 0;
            }
            .card-body {
                margin: 0;
                padding: 8px 8px 8px 12px;
                background-color: azure;
                border-radius: 2px;
            }
            .card-footer {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
            }
            .card-footer a {
                color: azure;
                padding: 5px 8px;
                background-color: var(--theme);
                border-radius: 3px;
                margin-bottom: 5px;
                transition: all .4s;
            }
            .card-footer a:hover {
                color: var(--theme-ecriture);
            }
            .card-footer small {
                color: rgb(124, 124, 124);
            }


            .sidebar {
                padding: 8px 25px;
                padding-right: 70px;
                height: calc(max-content + 100%);
                background-color: white;
                border-radius: 5px;
            }
            .sidebar-content li{
                color: var(--theme-ecriture);
                transition: all .4s;
            }
            .sidebar-content li:hover{
                text-decoration: underline;
            }
            .sidebar-content .active {
                text-decoration: underline;
            }
            .sidebar-content {
                line-height: 2.8;
            }

            /** Show */

            .main-show {
                text-align: justify;
                padding: 0px 25px;
            }
            .main-show .center {
                text-align: center;
            }



            /*

            .theme-sombre {
                --theme: rgb(0, 0, 0);
                --theme-ecriture: rgb(0, 134, 244);  
                --backgroung-theme: rgb(203, 235, 253);  
            }
            .theme-rose {
                --theme-ecriture: rgb(141, 15, 118);    
                --theme: rgb(255, 170, 225);
                --backgroun-theme: rgb(252, 211, 247); 
            }
            .theme-vert {
                --theme-ecriture: rgb(5, 65, 13);    
                --theme: rgb(120, 177, 111);
                --backgroung-theme: rgb(214, 253, 214); 
            }
            .theme-violet {
                --theme-ecriture: rgb(43, 0, 108);    
                --theme: rgb(162, 108, 255);
                --backgroung-theme: rgb(210, 170, 255); 
            }
            .theme-orange{
                --theme-ecriture: rgb(134, 48, 8);    
                --theme: rgb(250, 190, 176);
                --backgroung-theme: rgb(248, 189, 168); 
            }
            */
    </style>
    <div class="grid">
        <header class="topbar">
            <nav class="navbar">
                <div class="nav-link">
                    <a href="" class="navbar-title">Hermès</a>
                    <a href="index.php">Acceuil</a>
                    <a href="">Articles</a>
                </div>
                <a href="" class="logout">Se déconnecter</a>
            </nav>
        </header>
        <div class="banner">
            <h1 class="banner-title">Bienvenue sur mon blog</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error dolorem, nostrum veritatis vero impedit facere voluptatem perferendis tenetur ut itaque molestias animi optio natus, corporis quaerat temporibus. Tempore, commodi quas?</p>
        </div>
        <main class="main">
            <h1 class="main-title">Les derniers articles</h1>
            <div class="main-flex">
                <?php for($i = 1; $i <= 6; $i++): ?>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><a href="">cofee make you a better developper?</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis iusto magni exercitationem...</p>
                            <div class="card-footer">
                                <a href="show.php">Voir plus</a>
                                <small>Publié le 29/06/2023 à 17:53</small>
                            </div>
                        </div>
                    </div>
                <?php endfor ?>
            </div>
        </main>
        <aside class="sidebar">
            <h2 clas="sidebar-title">Catégories</h2>
            <div class="sidebar-content">
            <ul>
                <li class="active"><a href="">Seinen</a></li>
                <li><a href="">Shonen</a></li>
                <li><a href="">Thriller</a></li>
                <li><a href="">School life</a></li>
            </ul>
            </div>
        </aside>
        <footer class="footer" >
            créer par Hermès Eliram KONGO
        </footer>
    </div>
</body>
</html>