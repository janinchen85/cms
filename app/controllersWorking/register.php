<?php
class Register extends Controller{

    public function index(){
        $index = $this->heading("register");
        $this->setTitle("Easv Forum - Register");
        $index->assign("hideForm", "");
        $index->assign("userName", "");
        $index->assign("userEmail", "");
        $index->assign("userPW", "");
        $index->assign("confirmPW", "");
        $errorocount = 0;
        $message = array();
        if (isset($_POST["register"])){
            $results = $this->model('Users')->getUserByName($_POST["userName"]);
            if(!empty($results)){
                $message[] = "An account with this username already exists.";
                $errorocount++;
            }
            $results = $this->model('Users')->getUserByEmail($_POST["userEmail"]);
            if(!empty($results)){
                $message[] = "An account with this email already exists.";
                $errorocount++;
            }
            if(empty($_POST["userName"])){
                $message[] = "Please enter a desired username";
                $errorocount++;
            } 
            if(strlen($_POST["userName"]) < 6){
                $message[] = "Your username should be at least 6 characters long";
                $errorocount++;
            }
            if (preg_match('/\s/',$_POST["userName"])){
                $message[] = "The username can not have spaces";
                $errorocount++;
            }
            if(empty($_POST["userEmail"])){
                $message[] = "Please enter your e-mail address.";
                $errorocount++;
            } 
            if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
                $message[] = "Your e-mail address is invalid.";
                $errorocount++;
            }
            if (empty($_POST["userPW"]) || empty($_POST["confirmPW"])){
                $message[] = "Please enter a password.";
                $error[] = '8';
            } 
            if ($_POST["userPW"] !== $_POST["confirmPW"]){
                $message[] = "The entered passwords do not match.";
                $errorocount++;
            }
            if((strlen($_POST["userPW"]) < 6) || preg_match('/\s/',$_POST["userPW"]) || !preg_match('~[0-9]+~', $_POST["userPW"])){
                $message[] = "Please check your password: <br>
                              It must have at least 6 characters <br>
                              It must contain at least one number <br>
                              It can not have spaces.";
                $errorocount++;
            }
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["userName"])){
                $message[] = "Please dont use any special chars in your name!";
                $errorocount++;
            }
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["userPW"])){
                $message[] = "This chars are not allowed to use in your password: [\'^£$%&*()}{@#~?><>,|=_+¬-]";
                $errorocount++;
            }
            $this->errors($message, $errorocount);
            $index->assign("userName", $_POST["userName"]);
            $index->assign("userEmail", $_POST["userEmail"]);
            $index->assign("userPW", $_POST["userPW"]);
            $index->assign("confirmPW", $_POST["confirmPW"]);
            if($errorocount == 0){
                $index->assign("hideForm", "hidden");
                $this->model('Users')->newUser($_POST["userName"],$_POST["userEmail"],$_POST["userPW"]);
                $this->success("Your account has been created successfully.
                                If you are not redirected automatically, follow this <a href=\"./\">&nbsp;link</a>.");
                header("Refresh:3 url=".$this->getRoot()."/login");
            }
        }
        $this->setView();
    }
}
?>