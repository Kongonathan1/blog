<?php

use App\Auth\Auth;
use App\Helpers\Session;

Auth::check();
Session::Session_start();
session_destroy();
header('Location:' . $router->url('login') . '?logout=1');
exit();
