<?php

class Contacts extends DB{
    private $db, $sql;

    public function __construct() {
        $this->db   = new DB();
        $this->sql  = "";
    }

    public function getContact(){
        $this->db->connect();
        $this->sql = 'SELECT * FROM contact';
        $this->db->query($this->sql);
        $this->db->close();
        return $this->db->result();
    }

    public function setContact($contactName, $contactAddress, $contactPLZ, $contactCity, $contactTel, $contactEmail){
        $this->db->connect();
        $this->sql = 'UPDATE contact 
                      SET contactName = :contactName, contactAddress = :contactAddress,
                          contactPLZ = :contactPLZ, contactCity = :contactCity,
                          contactTel = :contactTel, contactEmail = :contactEmail';
        $this->db->query($this->sql);
        $this->db->bind(':contactName', $contactName);
        $this->db->bind(':contactAddress', $contactAddress);
        $this->db->bind(':contactPLZ', $contactPLZ);
        $this->db->bind(':contactCity', $contactCity);
        $this->db->bind(':contactTel', $contactTel);
        $this->db->bind(':contactEmail', $contactEmail);
        $this->db->execute();
        $this->db->close();
    }
}

?>