<?php

class Home extends Controller{
    /*public function index($name = ''){
        $user = $this->model('User');
        $user->name = $name;
        $this->view('home/index', ['name' => $user->name]);
    }*/
    public function index(){
        $index = new tpl('home/index');
        $header = new tpl('style/header');
        $nav = new tpl('style/navbar');
        $footer = new tpl('style/footer');
        $db = new db;
        $db->connect();
        $sql = 'SELECT * FROM category 
                ORDER BY categoryOrderID ASC';
        $result = $db->query($sql);
        while($row = $db->fetch_array($result)){
            $categoryList = new tpl("home/categoryList");
            $catID = $row["categoryID"];
            foreach ($row as $key => $value) {
                $categoryList->assign($key, $value);
                $categoryList->assign("forumList", "{\$forumList[".$catID."]}");
            }
            $categoryRow[] = $categoryList;
            $categoryContents = tpl::merge($categoryRow);
            $index->assign("categoryList", $categoryContents);
        } 
        for($i=1; $i <= $catID; $i++){
            $sql = 'SELECT * FROM forum_to_category ftc
                    INNER JOIN forum f 
                    ON ftc.forumID = f.forumID
                    AND ftc.categoryID = '.$i.'';
            $result = $db->query($sql);       
            while($row = $db->fetch_array($result)){
                $forumList = new tpl("home/forumList");
                foreach ($row as $key => $value) {
                    $forumList->assign($key, $value);
                }
                $forumRow[$i][] = $forumList;
                $forumContents = tpl::merge($forumRow[$i]);
                $index->assign("forumList[".$i."]", $forumContents);
            } 
        }
        $db->close();
        $header->assign("root", "../public/css/");
        $index->assign('header', $header->replace());
        $index->assign('navbar', $nav->replace());
        $index->assign('footer', $footer->replace());
        $index->replace();
        $index->show();
    }

}