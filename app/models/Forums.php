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
        return $this->db->results(); 
    }

    public function threadList($forumID){
        $this->db->connect();
        $this->sql = 'SELECT * FROM thread t
                      JOIN user u
                      ON t.userID = u.userID
                      WHERE t.forumID = :forumID';
        $this->db->query($this->sql);
        $this->db->bind(':forumID', $forumID);
        $this->db->close();  
        return $this->db->results(); 
    }

}

?>