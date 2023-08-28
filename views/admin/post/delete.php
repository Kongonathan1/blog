<?php

use App\Attachement\PostAttachement;
use App\Helpers\Connection;
use App\Table\PostTable;

$id = (int)$params['id'];
$pdo = Connection::getPDO();

$post = (new PostTable($pdo))->find($id);
PostAttachement::detachImage($post);

(new PostTable($pdo))->delete($id);

header('Location:' . $router->url('admin_post') . '?delete=1');
http_response_code(301);
exit();
?>