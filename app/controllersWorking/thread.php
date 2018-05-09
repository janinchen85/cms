<?php
class Thread extends Controller{
    public function index($threadID = ''){
        $index = $this->heading("thread", "", "navbar2");
        $this->setTitle("EASV Forum - {\$categoryName} - {\$forumName} - {\$threadTitle}");
        $results = $this->model('Threads')->getThread($threadID);
        foreach($results as $result){
            $threadVisits = $result["threadVisits"];
            $threadUser = $result["userID"];
            foreach ($result as $key => $value) {
                $index->assign($key, $value);
            }
            if($result["userStatus"] == 1){
                $index->assign("userStatus", "User is online");
                $index->assign("statusColor", "green");
            } else {
                $index->assign("userStatus", "User is offline");
                $index->assign("statusColor", "red");
            }
        }
        
        $results = $this->model('Categories')->getCategoryOfForum($result["forumID"]);
        foreach($results as $result){
            foreach ($result as $key => $value) {
                $index->assign($key, $value);
            }
        }
        $threadVisits++;
        $this->model('Threads')->countThreadVisit($threadID, $threadVisits);
        if($_SESSION["userID"] == $threadUser){
            $index->assign('hidden', "");
        } else {
            $index->assign('hidden', "hidden");
        }
        $results = $this->model('Threads')->getLastThreadEditor($threadID);
        foreach($results as $result){
            $index->assign("editUserName", $result['userName']);
        }
        $this->setView();
    }

    public function edit($threadID = ''){
        $results = $this->model('Threads')->getThread($threadID);
        foreach($results as $result){
            $threadEdits = $result["threadEdits"];
            if($_SESSION["userID"] != $result["userID"]){
                header("Location: ../../error");
            } else {
                $index = $this->heading("thread", "", "navbar2");
                $index->assign("hideForm", "");
                $index->assign("threadTitle", "");
                $index->assign("threadText", "");
                $index->assign("buttonText", "Edit Thread");
                $index->assign("buttonMethod", "edit");
                foreach ($result as $key => $value) {
                    $index->assign($key, $value);
                }
            }
        } 
        $results = $this->model('Categories')->getCategoryOfForum($result["forumID"]);
        foreach($results as $result){
            foreach ($result as $key => $value) {
                $index->assign($key, $value);
            }
        }
        if(isset($_POST["edit"])){
            $threadEdits++;
            $index->assign("hideForm", "hidden");
            $this->model('Threads')->editThread($_POST["threadTitle"], $_POST["threadText"], $threadID, $threadEdits, $_SESSION["userID"]);
            $this->success("Your thread has been updated successfully.
                            If you are not redirected automatically, follow this <a href=\"./\">&nbsp;link</a>.");
            header("Refresh:4 url=".$this->getRoot()."/thread/".$threadID."");
        }
        $this->setView();
    }
}
?>