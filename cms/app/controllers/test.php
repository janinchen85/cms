<?php
class Test extends Controller{
    public function index(){
        $index = new tpl('home/index');
        $header = new tpl('style/header');
        $nav = new tpl('style/navbar');
        $footer = new tpl('style/footer');
        $db = new DB;
        $db->connect();
        $sql = 'SELECT * FROM category 
                ORDER BY categoryOrderID ASC';
        $db->query($sql);
        $results = $db->results();
        foreach($results as $result){
            $categoryList = new tpl("home/categoryList");
            $catID = $result["categoryID"];
            foreach ($result as $key => $value) {
                $categoryList->assign($key, $value);
                $categoryList->assign("forumList", "{\$forumList[".$catID."]}");
            }
            $categoryRow[] = $categoryList;
            $categoryContents = tpl::merge($categoryRow);
            $index->assign("categoryList", $categoryContents);
        }
        for($i=1; $i <= $catID; $i++){
            $sql = 'SELECT * FROM forum 
                    WHERE categoryID = :id';
            $db->query($sql);
            $db->bind(':id', $i);
            $results = $db->results();     
            foreach($results as $result){
                $forumList = new tpl("home/forumList");
                foreach ($result as $key => $value) {
                    $forumList->assign($key, $value);
                }
                $forumRow[$i][] = $forumList;
                $forumContents = tpl::merge($forumRow[$i]);
                $index->assign("forumList[".$i."]", $forumContents);
            } 
        }
        $db->close();
        $header->assign("root", "../public/");
        $header->assign("title", "Easv Forum");
        $index->assign('header', $header->replace());
        $index->assign('navbar', $nav->replace());
        $index->assign('footer', $footer->replace());
        $index->replace();
        $index->show();
    }
}

?>