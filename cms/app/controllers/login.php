<?php
class Login extends Controller{
    public function index($forumID = ''){
        $_SESSION['LoggedIn'] = 0;
        $root = $this->getRoot();
        $index = $this->heading("login");
        $success = new tpl("login/success");
        $login = new tpl("login/login");
        $index->assign("title", "Easv Forum - Login");
        $login->assign('success', "");
        $login->assign('error', "");
        $index->assign("userName", "");
        $index->assign("userEmail", "");
        $index->assign("content", $login->replace());
        $db = new db;
        if (isset($_POST["login"])){
            $loginPW = $_POST["userPW"];       
            $db->connect();
            $sql = 'SELECT * FROM user 
                    WHERE userName = :userName';
            $db->query($sql);
            $db->bind(':userName', $_POST["userName"]);
            $results = $db->results();
            if(empty($results)){
                $error = new tpl('message/error');
                $error->assign("message","Could not find the specified user. Please check your entry or <a href=\"{$root}register\">&nbsp;register</a>.");
                $index->assign('error', $error->replace());
            } else {
                foreach($results as $result){
                    $hash = $result['userPW'];
                }
                if(password_verify($loginPW, $hash)){
                    $_SESSION['userID'] = $result['userID'];
                    $_SESSION['userName'] = $result['userName'];
                    $_SESSION['LoggedIn'] = 1;
                    sleep(1);
                    $index->assign("content", $success->replace());
                } else {
                    $error = new tpl('message/error');
                    $error->assign("message","The entered password is incorrect. Please check your entry or <a href=\"{$root}resetPW\">&nbsp;reset&nbsp;</a> your password.");
                    $index->assign('error', $error->replace());
                }
            }
            $db->close();
        }
        $index->replace();
        $index->show();
    }
    public function success($forumID = ''){
        $index = $this->heading("login", "success");
        $index->assign("title", "Easv Forum - Login success");
        $root = $this->getRoot();
        sleep(2);
        $index->replace();
        $index->show();
    }
}
?>