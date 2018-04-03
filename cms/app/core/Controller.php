<?php
require_once '../dev/engine/tpl_engine.php';
//require_once '../dev/database/db.php';
require_once '../dev/database/pdo.php';
class Controller {
    public function model($model){
        require_once '../app/models/'.$model.'.php';
        return new $model();
    }

    public function view($view, $d = []){
        require_once '../app/views/'.$view.'.php';
    }

    public function heading($index){
        $header = new tpl('style/header');
        $nav = new tpl('style/navbar');
        $footer = new tpl('style/footer');
        $index = new tpl($index.'/index');
        $root =  '/cms/public/'; 
        $header->assign("root", $root);
        $nav->assign("root", $root);
        $index->assign('header', $header->replace());
        $index->assign('navbar', $nav->replace());
        $index->assign('footer', $footer->replace());
        return $index;
    }
}

?>