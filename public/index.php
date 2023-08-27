<?php

use App\Router;

require  'C:\wamp\www\Blog\vendor\autoload.php';

$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


$slash = DIRECTORY_SEPARATOR;
//define('CHRONO', microtime(true));
define('UPLOAD_PATH', __DIR__ . $slash . 'uploads');
define('BASE_URL', 'http://localhost:8000/');
if(isset($_GET['page'])) {
    if($_GET['page'] === '1') {
        $uri = $_SERVER['REQUEST_URI'];
        $url = explode('?', $uri)[0];
        $get = $_GET;
        unset($get['page']);
        $i = http_build_query($get, $url);
        if(!empty($get)) {
            $url .= '?' . $i;
        }
        header('Location:' . $url);
    }
}
$router = new Router( dirname(__DIR__) . $slash . 'views');
$router
    ->get('/blog', 'post/index', 'blog')
    ->get('/category/[*:slug]-[i:id]', 'category/index', 'category')
    ->postAndget('/blog/article/[*:slug]-[i:id]','post/show', 'show_article')

    //Utilisateurs:
    ->postAndget('/admin/login', 'auth/login', 'login')
    ->post('/admin/logout', 'auth/logout', 'logout')

    //ADMIN:

    //Articles:
    ->get('/admin/posts','admin/post/index', 'admin_post')
    ->postAndget('/admin/edit/post-[i:id]', 'admin/post/edit', 'admin_post_edit')
    ->postAndget('/admin/add/post', 'admin/post/add', 'admin_post_add')
    ->post('/admin/delete/post-[i:id]', 'admin/post/delete', 'admin_post_delete')

    //Catégories:
    ->get('/admin/categories','admin/category/index', 'admin_category')
    ->postAndget('/admin/edit/category-[i:id]', 'admin/category/edit', 'admin_category_edit')
    ->postAndget('/admin/add/category', 'admin/category/add', 'admin_category_add')
    ->post('/admin/delete/category-[i:id]', 'admin/category/delete', 'admin_category_delete')

    ->run();