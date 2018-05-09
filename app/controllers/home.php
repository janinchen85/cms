<?php
class Home extends Controller{
    public function index(){
        $index = $this->heading("home","","navbar");
        $this->setTitle("EASV Forum");
        $results = $this->model('Abouts')->getAbout();
        foreach($results as $result){
            foreach ($result as $key => $value) {
                $index->assign($key, $value);
            }
        }
        $results = $this->model('Threads')->getHotThreads();
        foreach($results as $result){
            $hotList = new tpl("home/hotLists");
            foreach ($result as $key => $value) {
                $hotList->assign("firstInfo", $result["threadTitle"]);
                $hotList->assign("secondInfo", $result["threadVisits"]);
                $hotList->assign("threadID", $result["threadID"]);
                $hotList->assign("root",$this->getRoot());
            }
            $hotListRow[] = $hotList;
        }
        $hotListContents = tpl::merge($hotListRow);
        $index->assign("hotList", $hotListContents);
        $results = $this->model('Threads')->getLatestThreads();
        foreach($results as $result){
            $lastT = new tpl("home/hotLists");
            foreach ($result as $key => $value) {
                $lastT->assign("firstInfo", $result["threadTitle"]);
                $date = strtotime($result["threadDate"]);
                $date = date("d.m.y", $date);
                $time = strtotime($result["threadTime"]);
                $time = date("H:i", $time);
                $lastT->assign("secondInfo", $date ."  " .$time);
                $lastT->assign("threadID", $result["threadID"]);
                $lastT->assign("root",$this->getRoot());
            }
            $lastTRow[] = $lastT;
        }
        $lastTContents = tpl::merge($lastTRow);
        $index->assign("lastT", $lastTContents);
      /*  
        $lastP = new tpl("home/hotLists");
        $index->assign("lastP", $lastPContents);
    */

        $index->assign("content", "{\$categoryList}");
        $results = $this->model('Categories')->getCategories();
        foreach($results as $result){
            $catID = $result["categoryID"];
            $categoryList = new tpl("forum/categoryList");
            foreach ($result as $key => $value) {
                $categoryList->assign($key, $value);
                $categoryList->assign("forumList", "{\$forumList[".$catID."]}");
            }
            $categoryRow[] = $categoryList;
        }
        for($i=0; $i < $result["categoryID"]; $i++){
            $categoryList->assign("catNumber", $i);
        }
        $categoryContents = tpl::merge($categoryRow);
        $index->assign("categoryList", $categoryContents);
        for($i=1; $i <= $catID; $i++){
            $results = $this->model('Forums')->getForumsByCategory($i);   
            foreach($results as $result){
                $forumList = new tpl("forum/forumList");
                $forumList->assign("isHidden","hidden");
                $getForum = $result["forumID"];
                foreach ($result as $key => $value) {
                    $forumList->assign($key, $value);
                }
                $result = $this->model('Forums')->countThreadsOfForum($getForum);
                $threadCount = $result["count"];
                $result = $this->model('Forums')->countPostsOfForum($getForum);
                $postCount = $result["count"];
                $results = $this->model('Forums')->getLastThreadInfo($getForum);
                if(empty($results)){
                    $forumList->assign("isVisible","hidden");
                    $forumList->assign("isHidden","");
                } else {
                    foreach($results as $result){
                        foreach ($result as $key => $value) {
                            $forumList->assign($key, $value);
                            $date = strtotime($result["threadDate"]);
                            $day  = date('D', $date);
                            $date = date("d.m.y", $date);
                            $time = strtotime($result["threadTime"]);
                            $time = date("H:i", $time);
                            $forumList->assign("threadDay",$day);
                            $forumList->assign("threadtDate",$date);
                            $forumList->assign("threadTime",$time);
                        }
                    }
                }
                $forumList->assign("threadCount",$threadCount);
                $forumList->assign("postCount",$postCount);
                $forumList->assign("root",$this->getRoot());
                $forumRow[$i][] = $forumList;
                $forumContents = tpl::merge($forumRow[$i]);
                $index->assign("forumList[".$i."]", $forumContents);
            } 
        }
        $index->assign("buttonText", "Send Mail");
        $index->assign("buttonMethod", "send");
        $result = $this->model('Contacts')->getContact();
        foreach($result as $key => $value){
            $index->assign($key, $value);
            $toEmail = $result["contactEmail"];
        }
        if(isset($_POST["send"])){
            $fromEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            $name = filter_var($_POST["name"], FILTER_SANITIZE_SPECIAL_CHARS);
            $title = filter_var($_POST["title"], FILTER_SANITIZE_SPECIAL_CHARS);
            $text = filter_var($_POST["text"], FILTER_SANITIZE_SPECIAL_CHARS);
            $header = 'From: ' .$fromEmail. "\r\n" .
                      'Reply-To: ' .$fromEmail. "\r\n" .
                      'X-Mailer: PHP/' . phpversion();
            mail($toEmail, $title, $text, $header);
        }
        $this->setView();
    }
}
?>