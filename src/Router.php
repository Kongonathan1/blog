<?php
namespace App;

use AltoRouter;
use App\Exception\Security\FailedException;
class Router {

    private $viewPath; 
    private $router;
    public $template = 'template/html';

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        if(!isset($this->router)) {
            $this->router = new AltoRouter();
        }
        
    }

    public function get(string $url, string $target, string $name):self
    {
        $this->router->map('GET', $url, $target, $name);
        return $this;
    }

    public function post(string $url, string $target, ?string $name = null):self
    {
        $this->router->map('POST', $url, $target, $name);
        return $this;
    }

    public function postAndget(string $url, string $target, ?string $name = null):self
    {
        $this->router->map('GET|POST', $url, $target, $name);
        return $this;
    }

    public function url(string $routeName, array $params = [])
    {
        return $this->router->generate($routeName, $params);
    }

    public function run()
    {
        $match = $this->router->match();
        $view = $match['target'];
        $params = $match['params'];
        $router = $this;
        $isAdmin = strpos($view, 'admin/') !== null;
        try {
            ob_start();
            require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
            $content = ob_get_clean();
            require $this->viewPath . DIRECTORY_SEPARATOR . $this->template .'.php';
        } catch(FailedException $e) {
            header('Location:' . $router->url('login'). '?failed=1');
        }
        return $this;
    }

}