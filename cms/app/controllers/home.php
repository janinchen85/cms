<?php
class Home extends Controller{
    /*public function index($name = ''){
        $user = $this->model('User');
        $user->name = $name;
        $this->view('home/index', ['name' => $user->name]);
    }*/
    public function index(){
        $index = $this->heading("home");
        $index->assign("title", "Easv Forum");
        $db = new DB;
        $db->connect();
        $sql = 'SELECT * FROM category 
                ORDER BY categoryOrderID ASC';
        $db->query($sql);
        $results = $db->results();
        foreach($results as $result){
            $categoryList = new tpl("home/categoryList");
            $catID = $result["categoryID"];
            foreach ($result as $key => $value) {
                $categoryList->assign($key, $value);
                $categoryList->assign("forumList", "{\$forumList[".$catID."]}");
            }
            $categoryRow[] = $categoryList;
            $categoryContents = tpl::merge($categoryRow);
            $index->assign("categoryList", $categoryContents);
        }
        for($i=1; $i <= $catID; $i++){
            $sql = 'SELECT * FROM forum 
                    WHERE categoryID = :id';
            $db->query($sql);
            $db->bind(':id', $i);
            $results = $db->results();     
            foreach($results as $result){
                $forumList = new tpl("home/forumList");
                foreach ($result as $key => $value) {
                    $forumList->assign($key, $value);
                }
                $sql = 'SELECT COUNT(*) AS count FROM thread 
                        WHERE forumID = :id';
                $db->query($sql);
                $db->bind(':id', $result["forumID"]);
                $results = $db->results();
                foreach($results as $result){
                    $count = $result["count"];
                }
                $forumList->assign("threadCount",$count);
                $forumRow[$i][] = $forumList;
                $forumContents = tpl::merge($forumRow[$i]);
                $index->assign("forumList[".$i."]", $forumContents);
            } 
        }
        $db->close();
        $index->replace();
        $index->show();
    }
}

?>