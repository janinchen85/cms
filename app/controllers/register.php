<?php
class Register extends Controller{
    public function index(){
        // set template files
        $index = $this->heading("register","","navbar2");
        // set title
        $this->setTitle("Easv Forum - Register");
        // hide some variables within the html
        $index->assign("hideForm", "");
        $index->assign("userName", "");
        $index->assign("userEmail", "");
        $index->assign("userPW", "");
        $index->assign("confirmPW", "");
        // variable for error counting
        $errorocount = 0;
        // array for multiple error output
        $message = array();
        if(isset($_POST["register"])){
            // to prevent multiple submits (post)
            if(!empty($_POST) && empty($_SESSION['post'])) {
                $_SESSION['post'] = true;
                // Input validation
                $userName   = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
                $userEmail  = filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL);
                $userPW1    = filter_var($_POST['userPW'], FILTER_SANITIZE_STRING);
                $userPW2    = filter_var($_POST['userPW'], FILTER_SANITIZE_STRING);
                // error if invalid characters in username (for example < )
                if(empty($userName)){
                    $message[] = "Please enter a desired username!";
                    $errorocount++;
                }
                // Look if a user with this username already exists
                $results = $this->model('Users')->getUserByName($userName);
                // error if username already exist
                if(!empty($results)){
                    $message[] = "An account with this username already exists.";
                    $errorocount++;
                }
                // error if email is invalid
                if (empty($userEmail)) {
                    $message[] = "Your e-mail address is invalid.";
                    $errorocount++;
                }
                // Look if a user with this email already exists
                $results = $this->model('Users')->getUserByEmail($userEmail);
                // error if there is already a user with this Email
                if(!empty($results)){
                    $message[] = "An account with this email already exists.";
                    $errorocount++;
                }
                // check if the username is at least 6 characters long 
                if(strlen($userName) < 6){
                    $message[] = "Your username should be at least 6 characters long";
                    $errorocount++;
                }
                // cheack if there are spaces within the userName
                if (preg_match('/\s/',$userName)){
                    $message[] = "The username can not have spaces";
                    $errorocount++;
                }
                // check if a Email has been entered
                if(empty($_POST["userEmail"])){
                    $message[] = "Please enter your e-mail address.";
                    $errorocount++;
                } 
                // check if the password entries are empty
                if (empty($userPW1) || empty($userPW2)){
                    $message[] = "Please enter a password.";
                    $errorocount++;
                } 
                // check if both entered passwords match
                if ($userPW1 !== $userPW2){
                    $message[] = "The entered passwords do not match.";
                    $errorocount++;
                }
                // check some more password rules
                if((strlen($userPW1) < 6) || preg_match('/\s/',$userPW1) || !preg_match('~[0-9]+~', $userPW1)){
                    $message[] = "Please check your password: <br>
                                It must have at least 6 characters <br>
                                It must contain at least one number <br>
                                It can not have spaces.";
                    $errorocount++;
                }
                // send all error messages
                $this->errors($message, $errorocount);
                // show posted values in inputfields
                $index->assign("userName", $_POST["userName"]);
                $index->assign("userEmail", $_POST["userEmail"]);
                $index->assign("userPW", $_POST["userPW"]);
                $index->assign("confirmPW", $_POST["confirmPW"]);
                // if no error exist
                if($errorocount == 0){
                    // hide div in html
                    $index->assign("hideForm", "hidden");
                    // save user into Database
                    $this->model('Users')->newUser($userName,$userEmail,$userPW1);
                    // send success message
                    $this->success("Your account has been created successfully.
                                    If you are not redirected automatically, follow this <a href=\"./\">&nbsp;link</a>.");
                    // refresh and go to loginpage
                    header("Refresh:3 url=".$this->getRoot()."/login");
                }
            }
        }
        $this->setView();
    }
}
?>