<?php
class Logout extends Controller{
    public function index($forumID = ''){
        $index = $this->heading("logout");
        $index->assign("title", "Easv Forum - Logout");
        $index->assign('success', "");
        $index->assign('error', "");
        $db = new db;
        sleep(1);
        session_unset();
        $db->close();
        $index->replace();
        $index->show();
    }
}
?>