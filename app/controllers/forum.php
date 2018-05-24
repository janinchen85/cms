<?php
class Forum extends Controller{
    // Method: index()
    // Pamaneter: $forumID
    public function index($forumID = ""){
        // set views
        $index = $this->heading("threads","","navbar2");
        $this->setTitle("EASV Forum - {\$categoryName} - {\$forumName}");
        // get category of forum
        $results = $this->model('Categories')->getCategoryOfForum($forumID);
        foreach($results as $result){
            foreach ($result as $key => $value) {
                $index->assign($key, $value);
            }
            $index->assign("catNumber", $result["categoryID"]-1);
        }
        // get threadlist
        $results = $this->model('Forums')->threadList($forumID);
        if(empty($results)){
            // if no thread output empty message
            $empty = new tpl('threads/empty');
            $index->assign("threadList", $empty->replace());
        } else {
            // set output data
            foreach($results as $result){
                $threadList = new tpl("threads/threadList");
                $threadList->assign("isHidden","hidden");
                $threadID = $result["threadID"];
                foreach ($result as $key => $value) {
                    $threadList->assign($key, $value);
                    $threadList->assign("root",$this->getRoot());
                    $date = strtotime($result["threadDate"]);
                    $day  = date('D', $date);
                    $date = date("d.m.y", $date);
                    $time = strtotime($result["threadTime"]);
                    $time = date("H:i", $time);
                    $threadList->assign("threadDay",$day);
                    $threadList->assign("threadDate",$date);
                    $threadList->assign("threadTime",$time);
                }
                // get infor about last post of the thread
                $results = $this->model('Forums')->getLastpostInfo($threadID);
                if(empty($results)){
                    $threadList->assign("isVisible","hidden");
                    $threadList->assign("isHidden","");
                } else {
                    // set output data
                    foreach($results as $result){
                        foreach ($result as $key => $value) {
                            $threadList->assign($key, $value);
                            $date = strtotime($result["postDate"]);
                            $day  = date('D', $date);
                            $date = date("d.m.y", $date);
                            $time = strtotime($result["postTime"]);
                            $time = date("H:i", $time);
                            $threadList->assign("postDay",$day);
                            $threadList->assign("postDate",$date);
                            $threadList->assign("postTime",$time);
                        }
                    }
                }
                // get the number of Posts
                $result = $this->model('Threads')->countPostsOfThread($threadID);
                $postCount = $result["count"];
                $threadList->assign("postCount",$postCount);
                $threadRow[] = $threadList;
                $threadContents = tpl::merge($threadRow);
                $index->assign("threadList", $threadContents);
            }
        }
        $this->setView();
    }
}
?>