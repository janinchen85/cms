<?php
class Admin extends Controller{

    public function index(){
        $this->about();
    }

    public function about(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "about", "navbar");
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
                header("Refresh:3 url=".$this->getRoot()."#about");
            }
        } else {
            header("Location:" .$this->getRoot()."error");
        }
        $this->setView();
    }

    public function forum(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "forum", "navbar");
            $this->setView();
        } else {
            header("Location:" .$this->getRoot()."error");
        }
    }

    public function rules(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "rules", "navbar");
            $this->setView();
        } else {
            header("Location:" .$this->getRoot()."error");
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
                header("Refresh:3 url=".$this->getRoot()."#contact");
            }
        } else {
            header("Location:" .$this->getRoot()."error");
        }
        $this->setView();
    }

    public function users(){
        if(!empty($_SESSION["userID"] && $_SESSION["userRang"] == 1)) {
            $index = $this->heading("admin", "contact", "navbar");
            $this->setView();
        } else {
            header("Location:" .$this->getRoot()."error");
        }
    }
}
?>