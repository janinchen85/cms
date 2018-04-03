<?php

class Thread extends Controller{
    public function index($thread = ''){
        $index = new tpl('threads/'.$thread);
        $header = new tpl('style/header');
        $header->assign("root", "../../public/css/");
        $nav = new tpl('style/navbar');
        $footer = new tpl('style/footer');
        $index->assign('header', $header->replace());
        $index->assign('navbar', $nav->replace());
        $index->assign('footer', $footer->replace());
        $index->replace();
        $index->show();
    }

}