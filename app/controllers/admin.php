<?php
class Admin extends Controller{
    // Method: index()
    // For Admin Home 
    public function index(){
        $this->about();
    }
    // Method: about()
    // For Admin About
    public function about(){
        // check if session userID is not empty and if userRang == 1 (for admin)
        // is the user logged in and is administrator
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            // set view
            $index = $this->heading("admin", "about", "navbar");
            $this->setTitle("EASV Forum - Adminpanel - About");
            $results = $this->model('Abouts')->getAbout();
            foreach ($results as $result) {
                $index->assign("pTitle", $result["aboutTitle"]);
                $index->assign("pText", $result["aboutText"]);
            }
            $index->assign("hideForm", "");
            $index->assign("buttonText", "Edit About");
            $index->assign("buttonMethod", "edit");
            // set handling for post
            if(isset($_POST["edit"])){
                // set form as hidden
                $index->assign("hideForm", "hidden");
                // sanitize input
                $pTitle =  filter_var($_POST['pTitle'], FILTER_SANITIZE_STRING);
                $pText  =  filter_var($_POST['pText'], FILTER_SANITIZE_STRING);
                // user model to update Data
                $results = $this->model('Abouts')->setAbout($pTitle,$pText);
                // set success message
                $this->success("About text was successfully edited");
                // refresh
                header("Refresh:3 url=".$this->getRoot()."admin/about");
            }
        } else {
            // if not logged in or not admin = no access
            header("Location:".$this->getRoot()."error");
        }
        $this->setView();
    }
    // Method: forum()
    // for forum handlings
    public function forum(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            /*$index = $this->heading("admin", "forum", "navbar");
            $this->setView();*/
            header("Location:".$this->getRoot()."error");
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }
    // Method: rules()
    // rules view
    public function rules(){
        // check if logged in and admin
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            // set view
            $index = $this->heading("admin", "rules", "navbar2");
            $this->setTitle("EASV Forum - Adminpanel - Rules");
            $index->assign("buttonText", "Add Rule");
            $index->assign("buttonMethod", "add");
            $number = 0;
            // get rules out of database
            $results = $this->model('Rules')->getRules();
            // set view for rules, if data found
            if(!empty($results)){
                $index->assign("hide", "row forum_rows2");
                foreach($results as $result){
                    $number++;
                    $rulesList = new tpl("admin/rulesList");
                    foreach($result as $key => $value) {
                        $rulesList->assign($key, $value);
                        $rulesList->assign("number", $number);
                        $rulesList->assign("root", $this->getRoot());
                    }
                    $rulesListRow[] = $rulesList;
                }
                $rulesListContents = tpl::merge($rulesListRow);
                $index->assign("rulesList", $rulesListContents);
            } else {
                // set view, if no data found
                $index->assign("hide", "hidden");
                $rulesListError = new tpl("admin/rulesListError");
                $index->assign("rulesList", $rulesListError->replace());
            }
            $this->setView();
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }
    // Method: addRule()
    // to add more rules
    public function addRule(){
        // check if logged in and admin
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "rulesForm", "navbar");
            // set view
            $this->setTitle("EASV Forum - Adminpanel - Add Rule");
            $index->assign("buttonText", "Add Rule");
            $index->assign("buttonMethod", "add");
            $index->assign("ruleTitle", "");
            $index->assign("ruleDesc", "");
            // handling for adding new rules
            if(isset($_POST["add"])){
                $index->assign("hideForm", "hidden");
                // sanitize input
                $ruleTitle = filter_var($_POST["ruleTitle"],FILTER_SANITIZE_SPECIAL_CHARS);
                $ruleDesc  = filter_var($_POST["ruleDesc"],FILTER_SANITIZE_SPECIAL_CHARS);
                // user model to save to database
                $this->model('Rules')->addRule($ruleTitle, $ruleDesc);
                $this->success("Your rule has been added successfully.");
                header("Refresh:3 url=".$this->getRoot()."admin/rules");
            }
            $this->setView();
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }
    // Mehtod: editRule()
    // Parameter: $ruleID
    public function editRule($ruleID = ""){
        // check if logged in and admin
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            // set view
            $index = $this->heading("admin", "rulesForm", "navbar");
            $this->setTitle("EASV Forum - Adminpanel - Edit Rule");
            $index->assign("buttonText", "Edit Rule");
            $index->assign("buttonMethod", "edit");
            // get rule info by $ruleID
            $result = $this->model('Rules')->getRule($ruleID);
            foreach($result as $key => $value){
                $index->assign($key, $value);
            }
            // handling for editing rule
            if(isset($_POST["edit"])){
                $index->assign("hideForm", "hidden");
                // sanitize input
                $ruleTitle = filter_var($_POST["ruleTitle"],FILTER_SANITIZE_SPECIAL_CHARS);
                $ruleDesc  = filter_var($_POST["ruleDesc"],FILTER_SANITIZE_SPECIAL_CHARS);
                // user model to uprate data in database
                $this->model('Rules')->editRule($ruleID, $ruleTitle, $ruleDesc);
                $this->success("Your rule has been edited successfully.");
                header("Refresh:3 url=".$this->getRoot()."admin/rules");
            }
            $this->setView();
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }
     // Mehtod: editRule()
    // Parameter: $ruleID   
    public function deleteRule($ruleID = ""){
        // check if logged in and admin
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            // set view
            $index = $this->heading("admin", "deleteRule", "navbar");
            $this->setTitle("EASV Forum - Adminpanel - Delete Rule");
            // handling after choosing abort
            if(isset($_POST["abort"])){
                header("Location:".$this->getRoot()."admin/rules");
            }
            // handling after choosing delete
            if(isset($_POST["delete"])){
                $index->assign("hideForm", "hidden");
                // use model and paramaeter $ruleID to delete that rule
                $this->model('Rules')->deleteRule($ruleID);
                $this->success("Your rule has been deleted successfully.");
                header("Refresh:3 url=".$this->getRoot()."admin/rules");
            }
            $this->setView();
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }
    // Method: contact()
    // set contact data
    public function contact(){
        // check if logged in and admin
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            // variable for error counting
            $errorocount = 0;
            // array for multiple error output
            $message = array();
            // set view
            $index = $this->heading("admin", "contact", "navbar2");
            $index->assign("contactName", "");
            $index->assign("contactAddress", "");
            $index->assign("contactPLZ", "");
            $index->assign("contactCity", "");
            $index->assign("contactTel", "");
            $index->assign("contactEmail", "");
            $index->assign("hideForm", "");
            $index->assign("buttonText", "Edit Contact");
            $index->assign("buttonMethod", "edit");
            // get contact data out of database
            $result = $this->model('Contacts')->getContact();
            foreach($result as $key => $value){
                $index->assign($key, $value);
            }
            // handling for edit
            if(isset($_POST["edit"])){
                // sanitize input
                $contactName    = filter_var($_POST["contactName"],FILTER_SANITIZE_SPECIAL_CHARS);
                $contactAddress = filter_var($_POST["contactAddress"],FILTER_SANITIZE_SPECIAL_CHARS);
                $contactPLZ     = filter_var($_POST["contactPLZ"],FILTER_SANITIZE_NUMBER_INT);
                $contactCity    = filter_var($_POST["contactCity"],FILTER_SANITIZE_SPECIAL_CHARS);
                $contactTel     = filter_var($_POST["contactTel"],FILTER_SANITIZE_SPECIAL_CHARS);
                $contactEmail   = filter_var($_POST["contactEmail"],FILTER_SANITIZE_EMAIL);
                // error handling
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $contactName)) {
                    $message[] = "There are no special characters allowed in the contact name.";
                    $errorocount++;
                } 
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $contactAddress)) {
                    $message[] = "There are no special characters allowed in the contact address.";
                    $errorocount++;
                } 
                if (!is_numeric($contactPLZ)) {
                    $message[] = "The postal code may only have numbers.";
                    $errorocount++;
                } 
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $contactCity)) {
                    $message[] = "There are no special characters allowed for city.";
                    $errorocount++;
                } 
                if (preg_match('/[\'^£$%&*}{@#~?><>,|=_¬-]/', $contactTel)) {
                    $message[] = "The phone number can not have special characters except '(', ')' and '+' .";
                    $errorocount++;
                } 
                if (!filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
                    $message[] = "Your e-mail address is invalid.";
                    $errorocount++;
                } 
                $this->errors($message, $errorocount);
                // output entered data
                $index->assign("contactName", $contactName);
                $index->assign("contactAddress", $contactAddress);
                $index->assign("contactPLZ", $contactPLZ);
                $index->assign("contactCity", $contactCity);
                $index->assign("contactTel", $contactTel);
                $index->assign("contactEmail", $contactEmail);
                if($errorocount == 0){
                    // if no error save to database
                    $index->assign("hideForm", "hidden");
                    // use model to save data to database
                    $results = $this->model('Contacts')->setContact($contactName,$contactAddress,$contactPLZ ,$contactCity,$contactTel ,$contactEmail);
                    $this->success("Contact details successfully edited");
                    header("Refresh:3 url=".$this->getRoot()."admin/contact");
                }
            }
        } else {
            header("Location:".$this->getRoot()."error");
        }
        $this->setView();
    }
    // Method: users()
    // for editing registered users (ban/unban/rank...)
    public function users(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            /*$index = $this->heading("admin", "users", "navbar");
            $this->setView();*/
            header("Location:".$this->getRoot()."error");
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }
    // Method: settings()
    // to set up some page settings
    public function settings(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            /*$index = $this->heading("admin", "settings", "navbar");
            $this->setView();*/
            header("Location:".$this->getRoot()."error");
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }
}
?>