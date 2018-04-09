<?php
date_default_timezone_set('Europe/Berlin');
ob_start();
session_start();
require_once '../dev/engine/tpl_engine.php';
require_once '../dev/database/pdo.php';
class Controller {
    public function model($model){
        require_once '../app/models/'.$model.'.php';
        return new $model();
    }

    public function view($view, $d = []){
        require_once '../app/views/'.$view.'.php';
    }

    public function getRoot(){
        $root =  '/cms/public/'; 
        return $root;
    }
    public function heading($index, $method = ""){
        $header = new tpl('style/header');
        $nav = new tpl('style/navbar');
        $footer = new tpl('style/footer');
        if(empty($method)){
            $method = "index";
        }
        $index = new tpl($index.'/'.$method);
        $loggedIn = new tpl('style/loggedin');
        $loggedOut = new tpl('style/loggedout');
        $root =  '/cms/public/'; 
        $header->assign("root", $root);
        $nav->assign("root", $root);
        $loggedIn->assign("root", $root);
        $loggedOut->assign("root", $root);
        if($_SESSION['LoggedIn'] == 1){
            $loggedIn->assign("userName", $_SESSION['userName']);
            $nav->assign("loggedinout", $loggedIn->replace());
        } else {
            $nav->assign("loggedinout", $loggedOut->replace());
        }
        $index->assign('header', $header->replace());
        $index->assign('navbar', $nav->replace());
        $index->assign('footer', $footer->replace());
        return $index;
    }
}

?>