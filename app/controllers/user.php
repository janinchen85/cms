<?php
// create class User and extend this class with the Controller class
// every method of the Controller class, can be used within the User class
class User extends Controller{
    // Method: index()
    // Parameter: $userID
    public function index($userID = ''){
        // use heading method from Crontroller class
        // to set the html files views/user/index.php
        // and use views/style/navbar.php as navbar
        $index = $this->heading("user","","navbar"); // Method of the core controller
        // set the title
        $this->setTitle("Easv Forum - User view");   // Method of the core controller
        // use the Model Users to get user information by ID
        $result = $this->model('Users')->getUserInfo($userID); // Method of the model "Users"
        // get the data and assign to placeholder
        foreach ($result as $key => $value) {
            $index->assign($key, $value);   
        }
        // replace and show everything
        $this->setView(); // Method of the core controller
    }
}
?>