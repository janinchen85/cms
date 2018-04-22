<?php
class Forum extends Controller{
    public function index($forumID = ''){
        $index = $this->heading("forum");
        $this->setTitle("EASV Forum - {\$categoryName} - {\$forumName}");
        $results = $this->model('Categories')->getCategoryOfForum($forumID);
        foreach($results as $result){
            foreach ($result as $key => $value) {
                $index->assign($key, $value);
            }
        }
        $results = $this->model('Forums')->threadList($forumID);
        if(empty($results)){
            $empty = new tpl('forum/empty');
            $index->assign("threadList", $empty->replace());
        } else {
            foreach($results as $result){
                $threadList = new tpl("forum/threadList");
                foreach ($result as $key => $value) {
                    $threadList->assign($key, $value);
                }
                $threadRow[] = $threadList;
                $threadContents = tpl::merge($threadRow);
                $index->assign("threadList", $threadContents);
            }
        }
        $this->setView();
    }
}
?>