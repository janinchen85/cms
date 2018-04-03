<?php
class Register extends Controller{

    public function index(){
        $index = $this->heading("register");
        $index->assign("title", "Easv Forum");
        $db = new db;
        if (isset($_POST["register"])){
            $db->connect();
            $sql = "INSERT INTO user (userName, userEmail, userPW) 
                    VALUES (:userName, :userEmail, :userPW)";
            $db->query($sql);
            $db->bind(':userName', $_POST["userName"]);
            $db->bind(':userEmail', $_POST["userEmail"]);
            $db->bind(':userPW',  password_hash($_POST["userPW"], PASSWORD_DEFAULT));
            $db->execute();
            $db->close();
        }
        $index->replace();
        $index->show();
    }
}
?>