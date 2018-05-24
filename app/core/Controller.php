<?php

class Controller {
    private $timezone;
    private $root, $modelDir, $viewDir;
    private $header, $nav, $footer, $loggedIn, $loggedOut, $success, $error, $forum;
    private $index, $method;

    function __construct() {
        session_start();
        require_once                '../dev/engine/engine.php';
        require_once                '../dev/database/pdo.php';
        $this->timezone             = date_default_timezone_set('Europe/Berlin');
        $this->root                 = '/cms/public/'; 
        $this->modelDir             = '../app/models/';
        $this->viewDir              = '../app/views/';
        $this->index                = "home";
        $this->method               = "index";
        $this->navbar               = "navbar";
        $this->header               = new tpl('style/header');
        $this->footer               = new tpl('style/footer');
        $this->loggedIn             = new tpl('style/loggedin');
        $this->loggedOut            = new tpl('style/loggedout');
        $this->adminNav             = new tpl('style/adminnav');
        $this->success              = new tpl('message/success');
        $this->error                = new tpl('message/error');
        $this->forum                = new tpl('forum/index');
    }
    // Method: model()
    // Parameter: $model
    public function model($model){
        $modelFile = $this->modelDir.$model.'.php';
        // cheack if the file with this name exist
        if(file_exists($modelFile)){
            // if the file exist and is not already included, include this file
            require_once $modelFile; 
            // create new Object of the model class
            return new $model();
        } else {
            echo "Could not find this model: " .$modelFile; 
        }
    }
    // Method: view()
    // Parameter: $view
    // This method is currently not needed
    public function view($view){
        // save filepath in the variable $viewFile
        $viewFile = $this->viewDir.$view.'.php';
        // cheack if the file with this name exist
        if(file_exists($viewFile)){
            // if the file exist and is not already included, include this file
            require_once $viewFile;
        } else {
            echo "Could not find this view: " .$viewFile; 
        }
    }

    public function getRoot(){
        return $this->root;
    }

    // Method: index()
    // Parameter: $index, $method, $navbar
    public function heading($index = "", $method = "", $navbar = ""){
        // create a new template object for navbar
        $this->nav = new tpl('style/'.$navbar.'');
            // if the parameter variable $method is not empty rewrite the value of $this->method
            // with the value of the parameter variable $method
            if(!empty($method)){$this->method = $method;}
            // if the parameter variable $index is not empty rewrite the value of $this->index
            // with the value of the parameter variable $index
            if(!empty($index)){$this->index = $index;}
        // create a new tpl Object, so it can be user for the view
        $this->index = new tpl($this->index.'/'.$this->method);
            // check if active session
            if(!empty($_SESSION["active"])){
                // assign the Username 
                $this->loggedIn->assign("userName", $_SESSION['userName']);
                // Show Logged in navigation (username and logout)
                $this->nav->assign("loggedinout", $this->loggedIn->replace());
            } else {
                // Show logged out navigation (login and register)
                $this->nav->assign("loggedinout", $this->loggedOut->replace());
            }
            // if the userRang is 1 (=administrator) then show admin navibar
            if(isset($_SESSION["userRang"]) && $_SESSION["userRang"] == 1){
                // show admin navibar
                $this->nav->assign('adminNav', $this->adminNav->replace());
            } else {
                // else dont show admin navbar
                $this->nav->assign('adminNav', ""); 
            }
        $this->index->assign('header', $this->header->replace());
        $this->index->assign('navbar', $this->nav->replace());
        $this->index->assign('forum', $this->forum->replace());
        $this->index->assign('success', "");
        $this->index->assign('error', "");
        $this->index->assign('footer', $this->footer->replace());
        $this->index->assign('root', $this->getRoot());
        return $this->index;
    }

    public function setTitle($title){
        $this->index->assign('title', $title);
    }

    public function setSession($sessionUserID, $sessionUserName, $sessionUserRang){
        $_SESSION["visited"] = 0;
        $_SESSION["active"] = 1;
        $_SESSION["userID"] = $sessionUserID;
        $_SESSION["userName"] = $sessionUserName;
        $_SESSION["userRang"] = $sessionUserRang;
        $_SESSION["sessionStart"] = time();
    }

    public function unsetSession(){
        session_unset();
        session_destroy();
    }

    public function setView(){
        $this->index->replace();
        $this->index->show();
    }

    public function success($message){
        $this->success->assign("message", $message);
        $this->index->assign('success', $this->success->replace());
    }

    public function error($message){
        $this->error->assign("message", $message);
        $this->index->assign('error', $this->error->replace());
    }

    public function errors($message, $error){
        $i = 0;
        for( $x = $error; $x > 0; $x--){
            $errorList = new tpl("message/error");
            $errorList->assign("message", $message[$i]);
            $errorRow[] = $errorList;
            $errorContents = tpl::merge($errorRow);
            $this->index->assign("error", $errorContents);
            $i++;
        }
    }



    public function randomStr($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $rndStr = '';
        for ($i = 0; $i < $length; $i++) {
            $rndStr .= $characters[rand(0, $charactersLength - 1)];
        }
        return $rndStr;
    }
}

?>