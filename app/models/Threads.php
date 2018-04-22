<?php

class Threads extends DB{
    private $db, $sql, $timestamp, $date, $time, $lastID;

    public function __construct() {
        $this->db           = new DB();
        $this->sql          = "";
        $this->timestamp    = time();
        $this->date         = date("Y.m.d",$this->timestamp);
        $this->time         = date("H:i:s",$this->timestamp);
        $this->lastID       = 0;
    }

    public function getThread($threadID){
        $this->db->connect();
        $this->sql = 'SELECT * FROM thread t
                      JOIN user u
                      ON t.userID = u.userID
                      WHERE threadID = :threadID';
        $this->db->query($this->sql);
        $this->db->bind(':threadID', $threadID);
        $this->db->close();
        return $this->db->results(); 
    }

    public function getLastThreadEditor($threadID){
        $this->db->connect();
        $this->sql = 'SELECT * FROM thread t
                      JOIN user u
                      ON t.threadEditLastUserID = u.userID
                      WHERE threadID = :threadID';
        $this->db->query($this->sql);
        $this->db->bind(':threadID', $threadID);
        $this->db->close();
        return $this->db->results(); 
    }

    public function countThreadVisit($threadID, $threadVisits){
        $this->db->connect();
        $this->sql = 'UPDATE thread 
                      SET threadVisits = :threadVisits
                      WHERE threadID = :threadID';
        $this->db->query($this->sql);
        $this->db->bind(':threadID', $threadID);
        $this->db->bind(':threadVisits', $threadVisits);
        $this->db->execute();
        $this->db->close();
    }

    public function editThread($threadTitle, $threadText, $threadID, $threadEdits, $threadEditLastUserID){
        $this->db->connect();
        $this->sql = 'UPDATE thread 
                      SET threadTitle = :threadTitle, threadText = :threadText, threadEdits = :threadEdits, threadEditDate = :threadEditDate,
                          threadEditTime = :threadEditTime, threadEditLastUserID = :threadEditLastUserID
                      WHERE threadID = :threadID';
        $this->db->query($this->sql);
        $this->db->bind(':threadID', $threadID);
        $this->db->bind(':threadTitle', $threadTitle);
        $this->db->bind(':threadText', $threadText);
        $this->db->bind(':threadEdits', $threadEdits);
        $this->db->bind(':threadEditLastUserID', $threadEditLastUserID);
        $this->db->bind(':threadEditDate', $this->date);
        $this->db->bind(':threadEditTime', $this->time);
        $this->db->execute();
        $this->db->close();
    }

    public function addNewThread($threadTitle, $threadText, $userID, $forumID){
        $this->db->connect();
        $this->sql = 'INSERT INTO thread (threadTitle, threadText, threadDate, threadTime, userID, forumID) 
                      VALUES (:threadTitle, :threadText, :threadDate, :threadTime, :userID, :forumID)';
        $this->db->query($this->sql);
        $this->db->bind(':threadTitle', $threadTitle);
        $this->db->bind(':threadText', $threadText);
        $this->db->bind(':threadDate', $this->date);
        $this->db->bind(':threadTime', $this->time );
        $this->db->bind(':userID', $userID);
        $this->db->bind(':forumID', $forumID);
        $this->db->execute();
        $this->lastID = $this->db->lastInsertId();
        $this->db->close();
        return $this->lastID;
    }
}

?>