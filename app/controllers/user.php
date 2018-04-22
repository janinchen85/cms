<?php
class User extends Controller{
    public function index($userID = ''){
        $index = $this->heading("user");
        $this->setTitle("Easv Forum - User view");
        $results = $this->model('Users')->getUserInfo($userID);
        foreach($results as $result){
            foreach ($result as $key => $value) {
                $index->assign($key, $value);
            }
        }
        $this->setView();
    }
}
?>