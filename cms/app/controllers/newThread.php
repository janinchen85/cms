<?php
class newThread extends Controller{
    public function index($forumID = ''){
        $index = $this->heading("newThread");
        $index->assign("title", "Easv Forum");
        $index->assign('success', "");
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
            $sql = "INSERT INTO thread (threadTitle, threadText, forumID) 
                    VALUES (:threadTitle, :threadText, :forumID)";
            $db->query($sql);
            $db->bind(':threadTitle', $_POST["threadTitle"]);
            $db->bind(':threadText', $_POST["threadText"]);
            $db->bind(':forumID', $forumID);
            $db->execute();
            $db->close();
            $success = new tpl('newThread/success');
            $index->assign('success', $success->replace());
        }
        $index->replace();
        $index->show();
    }
}
?>