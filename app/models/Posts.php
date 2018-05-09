<?php

class Posts extends DB{

    public function __construct() {
        $this->db           = new DB();
        $this->sql          = "";
        $this->timestamp    = time();
        $this->date         = date("Y.m.d",$this->timestamp);
        $this->time         = date("H:i:s",$this->timestamp);
        $this->lastID       = 0;
    }

    public function addPost($postTitle, $postText, $userID, $threadID){
        $this->db->connect();
        $this->sql = 'INSERT INTO post (postTitle, postText, postDate, postTime, userID, threadID) 
                      VALUES (:postTitle, :postText, :postDate, :postTime, :userID, :threadID)';
        $this->db->query($this->sql);
        $this->db->bind(':postTitle', $postTitle);
        $this->db->bind(':postText', $postText);
        $this->db->bind(':postDate', $this->date);
        $this->db->bind(':postTime', $this->time );
        $this->db->bind(':userID', $userID);
        $this->db->bind(':threadID', $threadID);
        $this->db->execute();
        $this->db->close();
    }

    public function editPost($postTitle, $postText, $postID, $postEdits, $postEditLastUserID){
        $this->db->connect();
        $this->sql = 'UPDATE post 
                      SET postTitle = :postTitle, postText = :postText, postEdits = :postEdits, postEditDate = :postEditDate,
                          postEditTime = :postEditTime, postEditLastUserID = :postEditLastUserID
                      WHERE postID = :postID';
        $this->db->query($this->sql);
        $this->db->bind(':postID', $postID);
        $this->db->bind(':postTitle', $postTitle);
        $this->db->bind(':postText', $postText);
        $this->db->bind(':postEdits', $postEdits);
        $this->db->bind(':postEditLastUserID', $postEditLastUserID);
        $this->db->bind(':postEditDate', $this->date);
        $this->db->bind(':postEditTime', $this->time);
        $this->db->execute();
        $this->db->close();
    }

    public function getLastPostEditor($postID){
        $this->db->connect();
        $this->sql = 'SELECT * FROM post t
                      JOIN user u
                      ON t.postEditLastUserID = u.userID
                      WHERE postID = :postID';
        $this->db->query($this->sql);
        $this->db->bind(':postID', $postID);
        $this->db->close();
        return $this->db->results(); 
    }

    public function getPosts($threadID){
        $this->db->connect();
        $this->sql = 'SELECT * FROM post p
                      JOIN user u
                      ON p.userID = u.userID
                      WHERE threadID = :threadID';
        $this->db->query($this->sql);
        $this->db->bind(':threadID', $threadID);
        $this->db->close();
        return $this->db->results(); 
    }

    public function getPost($postID){
        $this->db->connect();
        $this->sql = 'SELECT * FROM post p 
                      JOIN user u 
                      ON p.userID = u.userID 
                      JOIN thread t 
                      ON t.threadID = p.threadID 
                      WHERE postID = :postID';
        $this->db->query($this->sql);
        $this->db->bind(':postID', $postID);
        $this->db->close();
        return $this->db->results(); 
    }

    public function deletePost($postID){
        $this->db->connect();
        $this->sql = 'DELETE FROM post 
                      WHERE postID = :postID';
        $this->db->query($this->sql);
        $this->db->bind(':postID', $postID);
        $this->db->execute();
        $this->db->close();
    }

}


?>