<?php

class Categories extends DB{
    private $db, $sql;

    public function __construct() {
        $this->db   = new DB();
        $this->sql  = "";
    }

    public function getCategories(){
        $this->db->connect();
        $this->sql = 'SELECT * FROM category 
                      ORDER BY categoryOrderID ASC';
        $this->db->query($this->sql);
        $this->db->close();
        return $this->db->results();
    }

    public function getCategoryOfForum($forumID){
        $this->db->connect();
        $this->sql = 'SELECT * FROM forum f 
                      Join category c 
                      ON f.categoryID = c.categoryID  
                      WHERE forumID = :forumID';
        $this->db->query($this->sql);
        $this->db->bind(':forumID', $forumID);
        $this->db->close();
        return $this->db->results();
    }
}

?>