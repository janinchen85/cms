<?php

class Controller {
    private $timezone;
    private $root, $modelDir, $viewDir;
    private $header, $nav, $footer, $loggedIn, $loggedOut, $success, $error;
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
        $this->header               = new tpl('style/header');
        $this->nav                  = new tpl('style/navbar');
        $this->footer               = new tpl('style/footer');
        $this->loggedIn             = new tpl('style/loggedin');
        $this->loggedOut            = new tpl('style/loggedout');
        $this->success              = new tpl('message/success');
        $this->error                = new tpl('message/error');
    }

    public function model($model){
        require_once $this->modelDir.$model.'.php';
        return new $model();
    }

    public function view($view){
        require_once $this->viewDir.$view.'.php';
    }

    public function getRoot(){
        return $this->root;
    }

    public function heading($index = "", $method = ""){
        if(!empty($method)){$this->method = $method;}
        if(!empty($index)){$this->index = $index;}
        $this->index = new tpl($this->index.'/'.$this->method);
        if(!empty($_SESSION["active"])){
            $this->loggedIn->assign("userName", $_SESSION['userName']);
            $this->nav->assign("loggedinout", $this->loggedIn->replace());
        } else {
            $this->nav->assign("loggedinout", $this->loggedOut->replace());
        }
        $this->index->assign('header', $this->header->replace());
        $this->index->assign('navbar', $this->nav->replace());
        $this->index->assign('success', "");
        $this->index->assign('error', "");
        $this->index->assign('footer', $this->footer->replace());
        $this->index->assign('root', $this->getRoot());
        return $this->index;
    }

    public function setTitle($title){
        $this->index->assign('title', $title);
    }

    public function setSession($sessionUserID, $sessionUserName){
        $_SESSION["active"] = 1;
        $_SESSION["userID"] = $sessionUserID;
        $_SESSION["userName"] = $sessionUserName;
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