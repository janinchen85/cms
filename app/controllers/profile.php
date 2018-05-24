<?php
class Profile extends Controller{
    public function index($success = ""){
        $index = $this->heading("profile","","navbar2");
        $this->setTitle("EASV Forum");
        $index->assign("hideForm", "");
        $index->assign('success', $success);
        define('MB', 1048576);
        $target_dir = "./img/profile/";
        $target_file = "";
        $width = "";
        $height = "";
        $imageFileType = "";
        $uploadError = 0;
        $result = $this->model('Users')->getUserInfo($_SESSION["userID"]);
            foreach ($result as $key => $value) {
                $index->assign($key, $value);
                $actualEmail = $result["userEmail"];
                $actualUser = $result["userName"];
                $hash = $result['userPW'];
                $index->assign("userPW", "");
                $index->assign("userPWOld", "");
            }
      
        if(isset($_POST["upload"])) {
            if(!empty($_POST) && empty($_SESSION['post'])) {
                $_SESSION['post'] = true;
                $target_file = $target_dir.basename($_FILES["userPicUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["userPicUpload"]["tmp_name"]);
                $width = $check[0];
                $height = $check[1];
                if($check == false) {
                    $this->error("This file is not an image");
                    $uploadError = 1;
                }
                unset($_SESSION['post']); 
            }
        }
        if(!empty($_FILES["userPicUpload"])){
            if (file_exists($target_file)) {
                $target_file = $target_dir.$this->randomStr()."_".basename($_FILES["userPicUpload"]["name"]);
            }
            if ($_FILES["userPicUpload"]["size"] > 5*MB) {
                $this->error("Your picture may not be larger than 5 MB.");
                $uploadError = 1;
            }
            if(($width > 240) || ($height > 280)){
                $this->error("Your picture may only have a width of 240px and a height of 280px.");
                $uploadError = 1;
            }
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "") {
                $this->error("Only the following file types are allowed: JPG, PNG, JPEG and GIF");
                $uploadError = 1;
            }
            if ($uploadError == 1) {
                $this->error('error', "");
            } else {
                if (move_uploaded_file($_FILES["userPicUpload"]["tmp_name"], $target_file)) {
                    $this->model('Users')->updateUserPicture($_SESSION["userID"],basename( $_FILES["userPicUpload"]["name"]));
                    $this->success("The file ". basename( $_FILES["userPicUpload"]["name"]). " has been uploaded.");
                    $uploadError = 0;
                    $results = $this->model('Users')->getUserInfo($_SESSION["userID"]);
                    foreach($results as $result){
                        foreach ($result as $key => $value) {
                            $index->assign($key, $value);
                        }
                    }
                } else {
                    $this->error("Sorry, there was an error uploading your file.");
                }
            }
        }
        // variable for error counting
        $errorocount = 0;
        // array for multiple error output
        $message = array();
        if(isset($_POST["update"])) {
            if(!empty($_POST) && empty($_SESSION['post'])) {
                $_SESSION['post'] = true;

                $userName   =  filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
                $userEmail  =  filter_var($_POST['userEmail'], FILTER_SANITIZE_EMAIL);
                $userCourse =  filter_var($_POST['userCourse'], FILTER_SANITIZE_STRING);
                $userFB     =  filter_var($_POST['userFB'], FILTER_SANITIZE_STRING);
                $userTW     =  filter_var($_POST['userTW'], FILTER_SANITIZE_STRING);
                $userPWOld  =  filter_var($_POST['userPWOld'], FILTER_SANITIZE_STRING);
                $userPW     =  filter_var($_POST['userPW'], FILTER_SANITIZE_STRING);

                $index->assign("userName", $userName);
                $index->assign("userEmail", $userEmail);
                $index->assign("userCourse", $userCourse);
                $index->assign("userFB", $userFB);
                $index->assign("userTW", $userTW);

                if(!empty($userPWOld)){
                    if(!password_verify($userPWOld, $hash)){
                        $message[] = "Old Password incorrect";
                        $errorocount++;
                    }
                }
                

                if($actualEmail != $userEmail){
                    // Look if a user with this email already exists
                    $results = $this->model('Users')->getUserByEmail($userEmail);
                    // error if there is already a user with this Email
                    if(!empty($results)){
                        $message[] = "An account with this email already exists.";
                        $errorocount++;
                    }
                }

                if($actualUser != $userName){
                     // Look if a user with this name already exists
                     $results = $this->model('Users')->getUserByName($userName);
                     // error if there is already a user with this name
                     if(!empty($results)){
                         $message[] = "An account with this username already exists.";
                         $errorocount++;
                     }
                }

                if(empty($userName)){
                    $message[] = "Please enter a desired username!";
                    $errorocount++;
                }
    
                // error if email is invalid
                if (empty($userEmail)) {
                    $message[] = "Your e-mail address is invalid.";
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

                if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                    $message[] = "Your e-mail address is invalid.";
                    $errorocount++;
                } 

                $this->errors($message, $errorocount);

                if($errorocount == 0){
                    $index->assign("hideForm", "hidden");
                    $this->model('Users')->updateUserInfo($_SESSION["userID"],$userName,$userEmail,$userCourse,$userFB,$userTW,$userPW);
                    $this->success("Your profile has been updated successfully");
                   
                    $_SESSION['userName'] = $_POST["userName"];
                    header("Refresh:3");
                }
                unset($_SESSION['post']);
            }
        }
        $this->setView();
    }
}
?>