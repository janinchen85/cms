<?php
class newThread extends Controller{
    public function index($forumID = ''){
        if(!empty($_SESSION['LoggedIn'])){
            $index = $this->heading("newThread");
            $index->assign("title", "Easv Forum");
            $timestamp = time();
            $date = date("Y.m.d",$timestamp);
            $time = date("H:i:s",$timestamp);
            $index->assign('success', "");
            $index->assign('error', "");
            $db = new db;
            $db->connect();
            $sql = 'SELECT * FROM forum f 
                    Join category c 
                    ON f.categoryID = c.categoryID  
                    WHERE forumID = :forumID';
            $db->query($sql);
            $db->bind(':forumID', $forumID);
            $results = $db->results();
            foreach($results as $result){
                foreach ($result as $key => $value) {
                    $index->assign($key, $value);
                }
            }
            $db->close();
            if (isset($_POST["newThread"])){
                $db->connect();
                $sql = "INSERT INTO thread (threadTitle, threadText, threadDate, threadTime, userID, forumID) 
                        VALUES (:threadTitle, :threadText, :threadDate, :threadTime, :userID, :forumID)";
                $db->query($sql);
                $db->bind(':threadTitle', $_POST["threadTitle"]);
                $db->bind(':threadText', $_POST["threadText"]);
                $db->bind(':threadDate', $date);
                $db->bind(':threadTime', $time);
                $db->bind(':userID', $_SESSION['userID']);
                $db->bind(':forumID', $forumID);
                $db->execute();
                $db->close();
                $success = new tpl('message/success');
                $success->assign("message","Your thread has been created successfully.");
                $index->assign('success', $success->replace());
            }
            $index->replace();
            $index->show();
        } else {
            $index = $this->heading("newThread", "error");
            $index->assign("title", "Easv Forum - New Thread error");
            $db = new db;
            $db->connect();
            $sql = 'SELECT * FROM forum f 
                    Join category c 
                    ON f.categoryID = c.categoryID  
                    WHERE forumID = :forumID';
            $db->query($sql);
            $db->bind(':forumID', $forumID);
            $results = $db->results();
            foreach($results as $result){
                foreach ($result as $key => $value) {
                    $index->assign($key, $value);
                }
            }
            $db->close();
            $index->replace();
            $index->show();
        }
    }
}
?>