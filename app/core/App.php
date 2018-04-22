<?php

class App{

    protected $controller = 'home';
    protected $method = 'index'; 
    protected $params = []; 

    public function __construct(){
        $url = $this->parseURL();
        if(isset($url[0]) && !is_numeric($url[0])){
            $this->controller = $url[0];
            unset($url[0]);
        }
        if(isset($url[1]) && !is_numeric($url[1])){
            $this->method = $url[1];
            unset($url[1]);
        }
        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;
        if(method_exists($this->controller,$this->method)){
            $this->params = $url ? array_values($url) : [];
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            header("HTTP/1.0 404 Not Found");
            die();
        }
    }

    public function parseURL(){
        if(isset($_GET['url'])){
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}

?>