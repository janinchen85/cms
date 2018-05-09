<?php

class Users extends DB{

    private $db, $sql;
    public $date, $time, $options;

    public function __construct() {
        $this->db               = new DB();
        $this->sql              = "";
        $this->timestamp        = time();
        $this->date             = date("Y.m.d",$this->timestamp);
        $this->time             = date("H:i:s",$this->timestamp);
    }

    public function getUserByName($userName){        
        $this->db->connect();
        $this->sql = 'SELECT * FROM user 
                      WHERE userName = :userName';
        $this->db->query($this->sql);
        $this->db->bind(':userName', $userName);
        $this->db->close();
        return $this->db->results(); 
    }

    public function getUserByEmail($userEmail){        
        $this->db->connect();
        $this->sql = 'SELECT * FROM user 
                      WHERE userEmail = :userEmail';
        $this->db->query($this->sql);
        $this->db->bind(':userEmail', $userEmail);
        $this->db->close();
        return $this->db->results(); 
    }

    public function getUserInfo($userID){
        $this->db->connect();
        $this->sql = 'SELECT * FROM user 
                      WHERE userID = :userID';
        $this->db->query($this->sql);
        $this->db->bind(':userID', $userID);
        $this->db->close();
        return $this->db->results(); 
    }

    public function newUser($userName, $userEmail, $userPW){
        $this->db->connect();
        $this->sql = 'INSERT INTO user (userName, userEmail, userPW, userRegDate) 
                      VALUES (:userName, :userEmail, :userPW, :userRegDate)';
        $this->db->query($this->sql);
        $this->db->bind(':userName', $userName);
        $this->db->bind(':userEmail', $userEmail);
        $this->db->bind(':userPW', trim(password_hash($userPW, PASSWORD_BCRYPT)));
        $this->db->bind(':userRegDate', $this->date);
        $this->db->execute();
        $this->db->close();
    }

    public function updateUserInfo($userID, $userName, $userEmail, $userCourse, $userFB, $userTW){
        $this->db->connect();
        $this->sql = 'UPDATE user 
                      SET userName = :userName, userEmail = :userEmail, userCourse = :userCourse, userFB = :userFB, userTW = :userTW
                      WHERE userID = :userID';
        $this->db->query($this->sql);
        $this->db->bind(':userID', $userID);
        $this->db->bind(':userName', $userName);
        $this->db->bind(':userEmail', $userEmail);
        $this->db->bind(':userCourse', $userCourse);
        $this->db->bind(':userFB', $userFB);
        $this->db->bind(':userTW', $userTW);
        $this->db->execute();
        $this->db->close();
    }

    /*
    public function addUserPostCount($userID){
        $this->db->connect();
        $this->sql = 'SELECT * FROM user 
                      WHERE userID = :userID';
        $this->db->query($this->sql);
        $this->db->bind(':userID', $userID);
        $results = $this->db->results();
        foreach($results as $result){
            $userPosts = $result["userPosts"]+1;
        }
        $this->sql = 'UPDATE user 
                      SET userPosts = :userPosts 
                      WHERE userID = :userID';
        $this->db->query($this->sql);
        $this->db->bind(':userID', $userID);
        $this->db->bind(':userPosts', $userPosts);
        $this->db->execute();
        $this->db->close();
    }*/

    public function countUserPosts($userID){
        $this->db->connect();
        $this->sql = 'SELECT count(*) 
                      AS userPosts 
                      FROM post 
                      WHERE userID = :userID';
        $this->db->query($this->sql);
        $this->db->bind(':userID', $userID);
        $this->db->close();
        return $this->db->result(); 
    }

    public function countUserThreads($userID){
        $this->db->connect();
        $this->sql = 'SELECT count(*) 
                      AS userThreads 
                      FROM thread
                      WHERE userID = :userID';
        $this->db->query($this->sql);
        $this->db->bind(':userID', $userID);
        $this->db->close();
        return $this->db->result(); 
    }

    public function updateUserPicture($userID, $picture){
        $this->db->connect();
        $this->sql = 'UPDATE user 
                      SET userPicture = :userPicture 
                      WHERE userID = :userID';
        $this->db->query($this->sql);
        $this->db->bind(':userID', $userID);
        $this->db->bind(':userPicture', $picture);
        $this->db->execute();
        $this->db->close();
    }

    public function updateUserStatus($userID, $status){
        $this->db->connect();
        $this->sql = 'UPDATE user 
                      SET userStatus = :userStatus 
                      WHERE userID = :userID';
        $this->db->query($this->sql);
        $this->db->bind(':userID', $userID);
        $this->db->bind(':userStatus', $status);
        $this->db->execute();
        $this->db->close();
    }
}

?>