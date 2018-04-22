<?php
class newThread extends Controller{
    public function index($forumID = ''){
        if($_SESSION["active"] == 1){
            $index = $this->heading("thread", "threadForm");
            $this->setTitle("EASV Forum - {\$categoryName} - {\$forumName}");
            $index->assign("hideForm", "");
            $index->assign("threadTitle", "");
            $index->assign("threadText", "");
            $index->assign("buttonText", "New Thread");
            $index->assign("buttonMethod", "newThread");
            if(isset($_POST["newThread"])){
                $index->assign("hideForm", "hidden");
                $id = $this->model('Threads')->addNewThread($_POST["threadTitle"],$_POST["threadText"],$_SESSION["userID"],$forumID);
                $this->model('Users')->addUserPostCount($_SESSION["userID"]);
                $this->success("Your thread has been created successfully.");
                header("Refresh:3 url=../thread/".$id."");
            }
            $results = $this->model('Categories')->getCategoryOfForum($forumID);
            foreach($results as $result){
                foreach ($result as $key => $value) {
                    $index->assign($key, $value);
                }
            }
            $this->setView();
        } else {
            $index = $this->heading("thread", "error");
            $this->setTitle("Easv Forum - New Thread error");
            $results = $this->model('Categories')->getCategoryOfForum($forumID);
            foreach($results as $result){
                foreach ($result as $key => $value) {
                    $index->assign($key, $value);
                }
            }
            $this->setView();
        }      
    }
}
?>