<?php
class Logout extends Controller{
    public function index($forumID = ''){
        $index = $this->heading("logout", "", "navbar");
        $index->assign("title", "Easv Forum - Logout");
        $this->model('Users')->updateUserStatus($_SESSION['userID'],0);
        $this->unsetSession();
        $this->success("You have been successfully logged out.
                        If you are not redirected automatically, follow this <a href=\"./\">&nbsp;link</a>.");
        header("Refresh:3 url=".$this->getRoot()."");
        $this->setView();
    }
}
?>