<?php
class Register extends Controller{

    public function index(){
        $index = $this->heading("register");
        $index->assign("title", "Easv Forum");
        $timestamp = time();
        $date = date("Y.m.d",$timestamp);
        $time = date("H:i:s",$timestamp);
        $index->assign('success', "");
        $index->assign('error', "");
        $index->assign("userName", "");
        $index->assign("userEmail", "");
        $index->assign("userPW", "");
        $index->assign("confirmPW", "");
        $error = array();
        $options = [
            'cost' => 12,
        ];
        $db = new db;
        if (isset($_POST["register"])){
            $db->connect();
            $sql = 'SELECT * FROM user 
                    WHERE userName = :userName';
            $db->query($sql);
            $db->bind(':userName', $_POST["userName"]);
            $results = $db->results();
            if(!empty($results)){
                $index->assign("message[1]", "An account with this username already exists.");
                $error[] = '1';
            }
            $sql = 'SELECT * FROM user 
                    WHERE userEmail = :userEmail';
            $db->query($sql);
            $db->bind(':userEmail', $_POST["userEmail"]);
            $results = $db->results();
            if(!empty($results)){
                $index->assign("message[2]", "An account with this email already exists.");
                $error[] = '2';
            }
            $db->close();
            if(empty($_POST["userName"])){
                $index->assign("message[3]", "Please enter a desired username");
                $error[] = '3';
            } 
            if(strlen($_POST["userName"]) < 6){
                $index->assign("message[4]", "Your username should be at least 6 characters long");
                $error[] = '4';
            }
            if (preg_match('/\s/',$_POST["userName"])){
                $index->assign("message[5]", "The username can not have spaces");
                $error[] = '5';
            }
            
            if(empty($_POST["userEmail"])){
                $index->assign("message[6]", "Please enter your e-mail address.");
                $error[] = '6';
            } 
            if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
                $index->assign("message[7]", "Your e-mail address is invalid.");
                $error[] = '7';
            }
            if (empty($_POST["userPW"]) || empty($_POST["confirmPW"])){
                $index->assign("message[8]", "Please enter a password.");
                $error[] = '8';
            } 
            if ($_POST["userPW"] !== $_POST["confirmPW"]){
                $index->assign("message[9]", "The entered passwords do not match.");
                $error[] = '9';
            }
            if((strlen($_POST["userPW"]) < 6) || preg_match('/\s/',$_POST["userPW"]) || !preg_match('~[0-9]+~', $_POST["userPW"])){
                $index->assign("message[10]", "Please check your password: <br>
                                               It must have at least 6 characters <br>
                                               It must contain at least one number <br>
                                               It can not have spaces.");
                $error[] = '10';
            }

            foreach($error as $err){
                $errorList = new tpl("message/error");
                $errorList->assign("message", "{\$message[".$err."]}");
                $errorRow[] = $errorList;
                $errorContents = tpl::merge($errorRow);
                $index->assign("error", $errorContents);
            }

            $index->assign("userName", $_POST["userName"]);
            $index->assign("userEmail", $_POST["userEmail"]);
            $index->assign("userPW", $_POST["userPW"]);
            $index->assign("confirmPW", $_POST["confirmPW"]);

            if(empty($error)){
                $db->connect();
                $sql = "INSERT INTO user (userName, userEmail, userPW) 
                        VALUES (:userName, :userEmail, :userPW)";
                $db->query($sql);
                $db->bind(':userName', $_POST["userName"]);
                $db->bind(':userEmail', $_POST["userEmail"]);
                $db->bind(':userPW', trim(password_hash($_POST["userPW"], PASSWORD_BCRYPT, $options)));
                $db->execute();
                $db->close();
                $success = new tpl('message/success');
                $success->assign("message","Your account has been created successfully.");
                $index->assign('success', $success->replace());
            }
        }
        $index->replace();
        $index->show();
    }
}
?>