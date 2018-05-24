<?php
class Login extends Controller{
    public function index($forumID = ''){
        // set template files
        $index = $this->heading("login","","navbar2");
        // set title
        $this->setTitle("EASV Forum - Login");
        // variable in the html (div tag to add a css class)
        $index->assign("hideForm", "");
        // check for POST
        if(isset($_POST["login"])){
            // to prevent multiple submits (post)
            if(!empty($_POST) && empty($_SESSION['post'])) {
                $_SESSION['post'] = true;
                // Input validation
                $loginUserName =  filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
                $loginPW = filter_var($_POST['userPW'], FILTER_SANITIZE_STRING);
                // error if invalid characters in password (for example < )
                if(empty($loginPW)){
                    $this->error("Invalid Characters in your password.");
                }
                // if the sting isnt empty after sanitizing
                if(!empty($loginUserName)){
                    // cheack if there is a user with this username
                    $results = $this->model('Users')->getUserByName($loginUserName);
                    // if user not found send an error
                    if(empty($results)){
                        $this->error("Could not find the specified user. Please check your entry or <a href=\"{\$root}register\">&nbsp;register</a>.");
                    } else {
                        // if user found, get the data
                        foreach($results as $result){
                            $hash = $result['userPW'];
                        }
                        // check if the postet password matches the password within the database
                        if(password_verify($loginPW, $hash)){
                            // set the css class to hide this div
                            $index->assign("hideForm", "hidden");
                            // set session variables for global use
                            $this->setSession($result['userID'], $result['userName'], $result['userRangID']);
                            // set the online status of the user to 1 (online)
                            $this->model('Users')->updateUserStatus($result['userID'],1);
                            // send a success message
                            $this->success("You have been successfully logged in.
                                            If you are not redirected automatically, follow this <a href=\"./\">&nbsp;link</a>.");
                            // refresh site and go to root                
                            header("Refresh:3 url=".$this->getRoot()."");
                        } else {
                            // error if the passwords didn't match
                            $this->error("The entered password is incorrect. Please check your entry or <a href=\"{\$root}resetPW\">&nbsp;reset&nbsp;</a> your password.");
                        }
                    }
                } else {
                    // error if the Username has invalid characters
                    $this->error("Invalid Characters in your Username.");
                }
            }
            // after successful login unset the $_SESSION['post'] variable
            unset($_SESSION['post']); 
        }
        $this->setView();
    }
}
?>