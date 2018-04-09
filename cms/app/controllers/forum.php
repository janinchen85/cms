<?php
class Forum extends Controller{
    public function index($forumID = ''){
        $index = $this->heading("forum");
        $index->assign("title", "Easv Forum");
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
        $sql = 'SELECT * FROM thread t
                JOIN user u
                ON t.userID = u.userID
                WHERE t.forumID = :forumID';
        $db->query($sql);
        $db->bind(':forumID', $forumID);
        $results = $db->results();
        if($db->rowCount() == 0){
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
        $db->close();
        $index->replace();
        $index->show();
    }
}