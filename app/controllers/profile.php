<?php
class Profile extends Controller{
    public function index($success = ""){
        $index = $this->heading("profile","","navbar");
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
        $results = $this->model('Users')->getUserInfo($_SESSION["userID"]);
        foreach($results as $result){
            foreach ($result as $key => $value) {
                $index->assign($key, $value);
            }
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
        if(isset($_POST["update"])) {
            if(!empty($_POST) && empty($_SESSION['post'])) {
                $_SESSION['post'] = true;
                $index->assign("hideForm", "hidden");
                $this->model('Users')->updateUserInfo($_SESSION["userID"],$_POST["userName"],$_POST["userEmail"],
                                                    $_POST["userCourse"],$_POST["userFB"],$_POST["userTW"]);
                $this->success("Your profile has been updated successfully");
                $results = $this->model('Users')->getUserInfo($_SESSION["userID"]);
                foreach($results as $result){
                    foreach ($result as $key => $value) {
                        $index->assign($key, $value);
                    }
                }
                $_SESSION['userName'] = $_POST["userName"];
                header("Refresh:3");
                unset($_SESSION['post']);
            }
        }
        $this->setView();
    }
}
?>