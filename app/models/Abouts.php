<?php

class Abouts extends DB{
    private $db, $sql;

    public function __construct() {
        $this->db   = new DB();
        $this->sql  = "";
    }

    public function getAbout(){
        $this->db->connect();
        $this->sql = 'CALL proc_get_about';
        /*$this->sql = 'SELECT * FROM about';*/
        $this->db->query($this->sql);
        $this->db->close();
        return $this->db->results();
    }

    public function setAbout($aboutTitle, $aboutText){
        $this->db->connect();
        $this->sql = 'UPDATE about 
                      SET aboutTitle = :aboutTitle, aboutText = :aboutText';
        $this->db->query($this->sql);
        $this->db->bind(':aboutTitle', $aboutTitle);
        $this->db->bind(':aboutText', $aboutText);
        $this->db->execute();
        $this->db->close();
    }
}

?>