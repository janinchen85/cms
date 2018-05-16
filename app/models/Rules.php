<?php

class Rules extends DB{
    private $db, $sql;

    public function __construct() {
        $this->db   = new DB();
        $this->sql  = "";
    }

    public function getRules(){
        $this->db->connect();
        $this->sql = 'SELECT * FROM rule';
        $this->db->query($this->sql);
        $this->db->close();
        return $this->db->results();
    }

    public function getRule($ruleID){
        $this->db->connect();
        $this->sql = 'SELECT * FROM rule
                      WHERE ruleID = :ruleID';
        $this->db->query($this->sql);
        $this->db->bind(':ruleID', $ruleID);
        $this->db->close();
        return $this->db->result();
    }

    public function addRule($ruleTitle, $ruleDesc){
        $this->db->connect();
        $this->sql = 'INSERT INTO rule (ruleTitle, ruleDesc)
                      VALUES (:ruleTitle, :ruleDesc)';
        $this->db->query($this->sql);
        $this->db->bind(':ruleTitle', $ruleTitle);
        $this->db->bind(':ruleDesc', $ruleDesc);
        $this->db->execute();
        $this->db->close();
    }

    public function editRule($ruleID, $ruleTitle, $ruleDesc){
        $this->db->connect();
        $this->sql = 'UPDATE rule 
                      SET ruleTitle = :ruleTitle, ruleDesc = :ruleDesc
                      WHERE ruleID = :ruleID';
        $this->db->query($this->sql);
        $this->db->bind(':ruleTitle', $ruleTitle);
        $this->db->bind(':ruleDesc', $ruleDesc);
        $this->db->bind(':ruleID', $ruleID);
        $this->db->execute();
        $this->db->close();
    }

    public function deleteRule($ruleID){
        $this->db->connect();
        $this->sql = 'DELETE FROM rule 
                      WHERE ruleID = :ruleID';
        $this->db->query($this->sql);
        $this->db->bind(':ruleID', $ruleID);
        $this->db->execute();
        $this->db->close();
    }
}

?>