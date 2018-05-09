<?php
class Home extends Controller{
    public function index(){
        $index = $this->heading("home");
        $this->setTitle("EASV Forum");
        $results = $this->model('Categories')->getCategories();
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
            $results = $this->model('Forums')->getForumsByCategory($i);   
            foreach($results as $result){
                $forumList = new tpl("home/forumList");
                foreach ($result as $key => $value) {
                    $forumList->assign($key, $value);
                }
                $results = $this->model('Forums')->countThreadsOfForum($result["forumID"]);
                foreach($results as $result){
                    $count = $result["count"];
                }
                $forumList->assign("threadCount",$count);
                $forumRow[$i][] = $forumList;
                $forumContents = tpl::merge($forumRow[$i]);
                $index->assign("forumList[".$i."]", $forumContents);
            } 
        }
        $this->setView();
    }
}
?>