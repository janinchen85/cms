<?php
class Admin extends Controller{

    public function index(){
        $this->about();
    }

    public function about(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
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
            if(isset($_POST["edit"])){
                $index->assign("hideForm", "hidden");
                $results = $this->model('Abouts')->setAbout($_POST["pTitle"],$_POST["pText"]);
                $this->success("About text was successfully edited");
                header("Refresh:3 url=".$this->getRoot()."admin/about");
            }
        } else {
            header("Location:".$this->getRoot()."error");
        }
        $this->setView();
    }

    public function forum(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "forum", "navbar");
            $this->setView();
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }

    public function rules(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "rules", "navbar2");
            $this->setTitle("EASV Forum - Adminpanel - Rules");
            $index->assign("buttonText", "Add Rule");
            $index->assign("buttonMethod", "add");
            $number = 0;
            $results = $this->model('Rules')->getRules();
            if(!empty($results)){
                $index->assign("hide", "row forum_rows2");
                foreach($results as $result){
                    $number++;
                    $rulesList = new tpl("admin/rulesList");
                    foreach($result as $key => $value) {
                        $rulesList->assign($key, $value);
                        $rulesList->assign("ruleID", $number);
                        $rulesList->assign("root", $this->getRoot());
                    }
                    $rulesListRow[] = $rulesList;
                }
                $rulesListContents = tpl::merge($rulesListRow);
                $index->assign("rulesList", $rulesListContents);
            } else {
                $index->assign("hide", "hidden");
                $rulesListError = new tpl("admin/rulesListError");
                $index->assign("rulesList", $rulesListError->replace());
            }
            $this->setView();
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }

    public function addRule(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "rulesForm", "navbar");
            $this->setTitle("EASV Forum - Adminpanel - Add Rule");
            $index->assign("buttonText", "Add Rule");
            $index->assign("buttonMethod", "add");
            $index->assign("ruleTitle", "");
            $index->assign("ruleDesc", "");
            if(isset($_POST["add"])){
                $index->assign("hideForm", "hidden");
                $ruleTitle = filter_var($_POST["ruleTitle"],FILTER_SANITIZE_SPECIAL_CHARS);
                $ruleDesc  = filter_var($_POST["ruleDesc"],FILTER_SANITIZE_SPECIAL_CHARS);
                $this->model('Rules')->addRule($ruleTitle, $ruleDesc);
                $this->success("Your rule has been added successfully.");
                header("Refresh:3 url=".$this->getRoot()."admin/rules");
            }
            $this->setView();
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }

    public function editRule($ruleID = ""){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "rulesForm", "navbar");
            $this->setTitle("EASV Forum - Adminpanel - Edit Rule");
            $index->assign("buttonText", "Edit Rule");
            $index->assign("buttonMethod", "edit");
            $result = $this->model('Rules')->getRule($ruleID);
            foreach($result as $key => $value){
                $index->assign($key, $value);
            }
            if(isset($_POST["edit"])){
                $index->assign("hideForm", "hidden");
                $ruleTitle = filter_var($_POST["ruleTitle"],FILTER_SANITIZE_SPECIAL_CHARS);
                $ruleDesc  = filter_var($_POST["ruleDesc"],FILTER_SANITIZE_SPECIAL_CHARS);
                $this->model('Rules')->editRule($ruleID, $ruleTitle, $ruleDesc);
                $this->success("Your rule has been edited successfully.");
                header("Refresh:3 url=".$this->getRoot()."admin/rules");
            }
            $this->setView();
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }

    public function deleteRule($ruleID = ""){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "deleteRule", "navbar");
            $this->setTitle("EASV Forum - Adminpanel - Delete Rule");
            if(isset($_POST["abort"])){
                header("Location:".$this->getRoot()."admin/rules");
            }
            if(isset($_POST["delete"])){
                $index->assign("hideForm", "hidden");
                $this->model('Rules')->deleteRule($ruleID);
                $this->success("Your rule has been deleted successfully.");
                header("Refresh:3 url=".$this->getRoot()."admin/rules");
            }
            $this->setView();
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }

    public function contact(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "contact", "navbar");
            $index->assign("contactName", "");
            $index->assign("contactAddress", "");
            $index->assign("contactPLZ", "");
            $index->assign("contactCity", "");
            $index->assign("contactTel", "");
            $index->assign("contactEmail", "");
            $index->assign("hideForm", "");
            $index->assign("buttonText", "Edit Contact");
            $index->assign("buttonMethod", "edit");
            $result = $this->model('Contacts')->getContact();
            foreach($result as $key => $value){
                $index->assign($key, $value);
            }
            if(isset($_POST["edit"])){
                $index->assign("hideForm", "hidden");
                $results = $this->model('Contacts')->setContact($_POST["contactName"],$_POST["contactAddress"],
                                                               $_POST["contactPLZ"],$_POST["contactCity"],
                                                               $_POST["contactTel"],$_POST["contactEmail"]);
                $this->success("Contact details successfully edited");
                header("Refresh:3 url=".$this->getRoot()."admin/contact");
            }
        } else {
            header("Location:".$this->getRoot()."error");
        }
        $this->setView();
    }

    public function users(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "contact", "navbar");
            $this->setView();
        } else {
            header("Location:".$this->getRoot()."error");
        }
    }
}
?>