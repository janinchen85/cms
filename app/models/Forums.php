<?php

class Forums extends DB{
    private $db, $sql;

    public function __construct() {
        $this->db   = new DB();
        $this->sql  = "";
    }

    public function getForumsByCategory($categoryID){
        $this->db->connect();
        $this->sql = 'SELECT * FROM forum 
                      WHERE categoryID = :categoryID';
        $this->db->query($this->sql);
        $this->db->bind(':categoryID', $categoryID);
        $this->db->close();  
        return $this->db->results(); 
    }

    public function countThreadsOfForum($forumID){
        $this->db->connect();
        $this->sql = 'SELECT COUNT(*) AS count FROM thread 
                      WHERE forumID = :forumID';
        $this->db->query($this->sql);
        $this->db->bind(':forumID', $forumID);
        $this->db->close();  
        return $this->db->result(); 
    }

    public function countPostsOfForum($forumID){
        $this->db->connect();
        $this->sql = 'SELECT COUNT(*) AS count FROM post p
                      JOIN thread t
                      ON t.threadID = p.threadID
                      WHERE forumID = :forumID';
        $this->db->query($this->sql);
        $this->db->bind(':forumID', $forumID);
        $this->db->close();  
        return $this->db->result(); 
    }

    public function getLastPostInfo($threadID){
        $this->db->connect();
        $this->sql = 'SELECT u.userID, u.userName, p.postDate, p.postTime 
                      FROM post p
                      JOIN user u 
                        ON p.userID = u.userID
                      WHERE p.threadID = :threadID
                      ORDER BY p.postID DESC LIMIT 1';
        $this->db->query($this->sql);
        $this->db->bind(':threadID', $threadID);
        $this->db->close();  
        return $this->db->results(); 
    }

    public function getLastThreadInfo($forumID){
        $this->db->connect();
        $this->sql = 'SELECT u.userID, u.userName, t.* 
                      FROM thread t
                      JOIN user u 
                        ON t.userID = u.userID
                      WHERE t.forumID = :forumID
                      ORDER BY t.threadID DESC LIMIT 1';
        $this->db->query($this->sql);
        $this->db->bind(':forumID', $forumID);
        $this->db->close();  
        return $this->db->results(); 
    }

    public function threadList($forumID){
        $this->db->connect();
        $this->sql = 'SELECT u.userID, u.userName, t.threadID, t.threadTitle, t.threadDate, t.threadTime, p.postID 
                      FROM thread t
                      JOIN user u
                        ON t.userID = u.userID
                      LEFT JOIN post p
                        ON t.threadID = p.threadID
                      WHERE t.forumID = :forumID
                      GROUP BY t.threadID
                      ORDER BY p.postID DESC, t.threadID DESC';
        $this->db->query($this->sql);
        $this->db->bind(':forumID', $forumID);
        $this->db->close();  
        return $this->db->results(); 
    }

}

?>