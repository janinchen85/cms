<?php

class App{

    protected $controller = 'home';
    protected $method = 'index'; 
    protected $params = []; 

    public function __construct(){
        // call method parseURL() to get a string
        $url = $this->parseURL();
        echo $url;
        // isset = Check if the variable exists and if it is not NULL
        // !is_numeric = check if the variable is not a number 
      /*  if(isset($url[0]) && !is_numeric($url[0])){
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
        }*/
    }

    public function parseURL(){
        if(isset($_GET['url'])){
            // explode = Search a string for the delimiter "/" and then split the string.
            // rtrim = remove white space (or other characters) from the end of a string
            // in this case: remove "/" at the end of thie url
            // FILTER_SANITIZE_URL = remove all illegal URL characters from a string
            // Example: $url= /public/home/
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)); 
            // return = "public" rest string = /home/
        }
    }

}
$app = new App();
?>