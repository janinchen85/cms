<?php
class Login extends Controller{
    public function index($forumID = ''){
        $index = $this->heading("login","","navbar");
        $this->setTitle("EASV Forum - Login");
        $index->assign("hideForm", "");
        if (isset($_POST["login"])){
            if(!empty($_POST) && empty($_SESSION['post'])) {
                $_SESSION['post'] = true;
                $loginPW = $_POST["userPW"];   
                $results = $this->model('Users')->getUserByName($_POST["userName"]);
                if(empty($results)){
                    $this->error("Could not find the specified user. Please check your entry or <a href=\"{\$root}register\">&nbsp;register</a>.");
                } else {
                    foreach($results as $result){
                        $hash = $result['userPW'];
                    }
                    if(password_verify($loginPW, $hash)){
                        $index->assign("hideForm", "hidden");
                        $this->setSession($result['userID'], $result['userName'], $result['userRangID']);
                        $this->model('Users')->updateUserStatus($result['userID'],1);
                        $this->success("You have been successfully logged in.
                                        If you are not redirected automatically, follow this <a href=\"./\">&nbsp;link</a>.");
                        header("Refresh:3 url=".$this->getRoot()."");
                    } else {
                        $this->error("The entered password is incorrect. Please check your entry or <a href=\"{\$root}resetPW\">&nbsp;reset&nbsp;</a> your password.");
                    }
                }
            }
            unset($_SESSION['post']); 
        }
        $this->setView();
    }
}
?>