<?php

use App\Helpers\Connection;
use App\Table\CategoryTable;

$id = (int)$params['id'];
$pdo = Connection::getPDO();
(new CategoryTable($pdo))->delete($id);

header('Location:' . $router->url('admin_category') . '?delete=1');
http_response_code(301);
exit();
?>