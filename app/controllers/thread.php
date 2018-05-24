<?php
class Thread extends Controller {
    public function index($threadID = "") {
        if(empty($threadID)){
            header("Location:" .$this->getRoot());
        }
        $index = $this->heading("thread", "", "navbar2");
        $this->setTitle("EASV Forum - {\$categoryName} - {\$forumName} - {\$pTitle}");
        $results = $this->model('Threads')->getThread($threadID);
        foreach ($results as $result) {
            $threadView   = new tpl("thread/threadView");
            $threadVisits = $result["threadVisits"];
            $threadUser   = $result["userID"];
            foreach ($result as $key => $value) {
                $threadView->assign($key, $value);
            }
        }
        if($_SESSION["active"] == 1 && $_SESSION["visited"] == 0){
            $threadVisits++;
            $_SESSION["visited"] = 1;
            $this->model('Threads')->countThreadVisit($threadID, $threadVisits);
        }
        $results = $this->model('Categories')->getCategoryOfForum($result["forumID"]);
        foreach ($results as $result) {
            foreach ($result as $key => $value) {
                $threadView->assign($key, $value);
            }
            $threadView->assign("catNumber", $result["categoryID"] - 1);
        }
        $result = $this->model('Users')->getUserInfo($threadUser);
            foreach ($result as $key => $value) {
                $threadView->assign($key, $value);
            }
            if ($result["userStatus"] == 1) {
                $threadView->assign("userStatus", "User is online");
                $threadView->assign("statusColor", "#3f91e0");
            } else {
                $threadView->assign("userStatus", "User is offline");
                $threadView->assign("statusColor", "#ae1812");
            }
            $date = strtotime($result["userRegDate"]);
            $date = date("d.m.y", $date);
            $threadView->assign("userRegDate", $date);
            $result = $this->model("Users")->countUserPosts($threadUser);
            $threadView->assign("userPosts", $result["userPosts"]);
            $result = $this->model("Users")->countUserThreads($threadUser);
            $threadView->assign("userThreads", $result["userThreads"]);
        
        if (empty($_SESSION["userID"])) {
            $threadView->assign('hidden', "hidden");
        }
        $results = $this->model('Threads')->getLastThreadEditor($threadID);
        foreach ($results as $result) {
            $threadView->assign("editUserName", $result['userName']);
            $date = strtotime($result["threadEditDate"]);
            $date = date("d.m.y", $date);
            $threadView->assign("threadEditDate", $date);
            $time = strtotime($result["threadEditTime"]);
            $time = date("H:i", $time);
            $threadView->assign("threadEditTime", $time);
        }
        $threadView->assign("root", $this->getRoot());
        $threadRow[]    = $threadView;
        $threadContents = tpl::merge($threadRow);
        $index->assign("threadView", $threadContents);
        
        
        $results = $this->model('Posts')->getPosts($threadID);
        if (empty($results)) {
            $index->assign("postList", "");
        } else {
            foreach ($results as $result) {
                $postView = new tpl("thread/postView");
                $postUser = $result["userID"];
                $postID = $result["postID"];
                foreach ($result as $key => $value) {
                    $postView->assign($key, $value);
                }
                $result = $this->model('Users')->getUserInfo($postUser);
                foreach ($result as $key => $value) {
                    $postView->assign($key, $value);
                }
                if ($result["userStatus"] == 1) {
                    $postView->assign("userStatus", "User is online");
                    $postView->assign("statusColor", "#3f91e0");
                } else {
                    $postView->assign("userStatus", "User is offline");
                    $postView->assign("statusColor", "#ae1812");
                }
                $date = strtotime($result["userRegDate"]);
                $date = date("d.m.y", $date);
                $postView->assign("userRegDate", $date);
                $result = $this->model("Users")->countUserPosts($postUser);
                $postView->assign("userPosts", $result["userPosts"]);
                $result = $this->model("Users")->countUserThreads($postUser);
                $postView->assign("userThreads", $result["userThreads"]);
            
            $results = $this->model('Posts')->getLastPostEditor($postID);
            foreach ($results as $result) {
                $postView->assign("editUserName", $result['userName']);
                $date = strtotime($result["postEditDate"]);
                $date = date("d.m.y", $date);
                $postView->assign("postEditDate", $date);
                $time = strtotime($result["postEditTime"]);
                $time = date("H:i", $time);
                $postView->assign("postEditTime", $time);
            }
            if (empty($_SESSION["userID"])) {
                $postView->assign('hidden', "hidden");
            }
            $postView->assign("root", $this->getRoot());
            $postRow[]    = $postView;
            $postContents = tpl::merge($postRow);
            $index->assign("postView", $postContents);
            }
        }
        $this->setView();
    }
    public function edit($threadID = '') {
        $results = $this->model('Threads')->getThread($threadID);
        foreach ($results as $result) {
            $threadEdits = $result["threadEdits"];
            if ($_SESSION["userID"] != $result["userID"]) {
                header("Location: ../../error");
            } else {
                $index = $this->heading("thread", "form", "navbar2");
                $this->setTitle("EASV Forum - {\$categoryName} - {\$forumName} - {\$pTitle} - Edit");
                $index->assign("hideForm", "");
                $index->assign("threadTitle", $result["threadTitle"]);
                $index->assign("pTitle", $result["threadTitle"]);
                $index->assign("pText", $result["threadText"]);
                $index->assign("buttonText", "Edit Thread");
                $index->assign("buttonMethod", "edit");
                $index->assign("action", "Thread edit");
                $index->assign("threadID", $result["threadID"]);
            }
        }
        $results = $this->model('Categories')->getCategoryOfForum($result["forumID"]);
        foreach ($results as $result) {
            foreach ($result as $key => $value) {
                $index->assign($key, $value);
            }
        }
        if (isset($_POST["edit"])) {
            $threadEdits++;
            $index->assign("hideForm", "hidden");
            $pTitle = filter_var($_POST["pTitle"], FILTER_SANITIZE_STRING);
            $pText = preg_replace('/(script.*?(?:\/|&#47;|&#x0002F;)script)/ius', '', $_POST["pText"]);
            $this->model('Threads')->editThread($pTitle, $pText, $threadID, $threadEdits, $_SESSION["userID"]);
            $this->success("Your thread has been updated successfully.
                            If you are not redirected automatically, follow this <a href=\"../$threadID\">&nbsp;link</a>.");
            header("Refresh:4 url=" . $this->getRoot() . "thread/" . $threadID . "");
        }
        $this->setView();
    }
    public function postEdit($postID = '') {
        $results = $this->model('Posts')->getPost($postID);
        foreach ($results as $result) {
            $postEdits = $result["postEdits"];
            if ($_SESSION["userID"] != $result["userID"]) {
                header("Location: ../../error");
            } else {
                $index = $this->heading("thread", "form", "navbar2");
                $this->setTitle("EASV Forum - {\$categoryName} - {\$forumName} - {\$pTitle} - Edit");
                $index->assign("hideForm", "");
                $index->assign("threadTitle", $result["threadTitle"]);
                $index->assign("pTitle", $result["postTitle"]);
                $index->assign("pText", $result["postText"]);
                $index->assign("buttonText", "Edit Post");
                $index->assign("buttonMethod", "edit");
                $index->assign("action", "Thread edit");
                $index->assign("threadID", $result["threadID"]);
                $threadID = $result["threadID"];
            }
        }
        $results = $this->model('Categories')->getCategoryOfForum($result["forumID"]);
        foreach ($results as $result) {
            foreach ($result as $key => $value) {
                $index->assign($key, $value);
            }
        }
        if(isset($_POST["edit"])) {
            $postEdits++;
            $index->assign("hideForm", "hidden");
            $pTitle = filter_var($_POST["pTitle"], FILTER_SANITIZE_STRING);
            $pText = preg_replace('/(script.*?(?:\/|&#47;|&#x0002F;)script)/ius', '', $_POST["pText"]);
            $this->model('Posts')->editPost($pTitle, $pText, $postID, $postEdits, $_SESSION["userID"]);
            $this->success("Your thread has been updated successfully.
                            If you are not redirected automatically, follow this <a href=\"../$threadID\">&nbsp;link</a>.");
            header("Refresh:4 url=" . $this->getRoot() . "thread/" . $threadID . "");
        }
        $this->setView();
    }

    public function reply($threadID = '') {
        $results = $this->model('Threads')->getThread($threadID);
        foreach ($results as $result) {
            if (empty($_SESSION["userID"])) {
                header("Location: ../../error");
            } else {
                $index = $this->heading("thread", "form", "navbar2");
                $index->assign("hideForm", "");
                $index->assign("pText", "");
                $index->assign("buttonText", "Reply");
                $index->assign("buttonMethod", "reply");
                $index->assign("action", "Reply");
                $index->assign("threadID", $result["threadID"]);
                $index->assign("pTitle", "Re: " . $result["threadTitle"]);
                $index->assign("threadTitle", $result["threadTitle"]);
            }
        }
        if (isset($_POST["reply"])) {
            $index->assign("hideForm", "hidden");
            $pTitle = filter_var($_POST["pTitle"], FILTER_SANITIZE_STRING);
            $pText = preg_replace('/(script.*?(?:\/|&#47;|&#x0002F;)script)/ius', '', $_POST["pText"]);
            $this->model('Posts')->addPost($pTitle, $pText, $_SESSION["userID"], $threadID);
            $this->success("Your thread has been updated successfully.
                            If you are not redirected automatically, follow this <a href=" . $this->getRoot() . "thread/" . $threadID . ">&nbsp;link</a>.");
            header("Refresh:3 url=" . $this->getRoot() . "thread/" . $threadID . "");
        }
        $this->setView();
    }
    public function newThread($forumID = '') {
        if (!empty($_SESSION["userID"])) {
            $index = $this->heading("thread", "form", "navbar2");
            $this->setTitle("EASV Forum - {\$categoryName} - {\$forumName}");
            $index->assign("hideForm", "");
            $index->assign("pTitle", "Please enter a title...");
            $index->assign("pText", "");
            $index->assign("buttonText", "New Thread");
            $index->assign("buttonMethod", "newThread");
            $index->assign("action", "New Thread");
            $index->assign("hideText", "hidden");
            if (isset($_POST["newThread"])) {
                $index->assign("hideForm", "hidden");
                $pTitle = filter_var($_POST["pTitle"], FILTER_SANITIZE_STRING);
                $pText = preg_replace('/(script.*?(?:\/|&#47;|&#x0002F;)script)/ius', '', $_POST["pText"]);
                $id = $this->model('Threads')->addNewThread($pTitle, $pText, $_SESSION["userID"], $forumID);
                //$this->model('Users')->addUserPostCount($_SESSION["userID"]);
                $this->success("Your thread has been created successfully.");
                header("Refresh:3 url=" . $this->getRoot() . "thread/" . $id . "");
            }
            $results = $this->model('Categories')->getCategoryOfForum($forumID);
            foreach ($results as $result) {
                foreach ($result as $key => $value) {
                    $index->assign($key, $value);
                }
            }
            $this->setView();
        } else {
            $index = $this->heading("thread", "error", "navbar2");
            $this->setTitle("Easv Forum - New Thread error");
            $results = $this->model('Categories')->getCategoryOfForum($forumID);
            foreach ($results as $result) {
                foreach ($result as $key => $value) {
                    $index->assign($key, $value);
                }
            }
            $this->setView();
        }
    }
    public function delete($id = '', $deleteMethod = '') {
        $index = $this->heading("thread", "delete", "navbar2");
        if(empty($_SESSION["userID"])){
            $this->error("You are not allowed to view this site!");
        } else {
            if($deleteMethod == "post"){
                $index->assign("method","Post");
                $results = $this->model('Posts')->getPost($id);
                foreach ($results as $result) {
                    $postUser = $result["userID"];
                }
                if($postUser != $_SESSION["userID"]){
                    $this->error("You are not allowed to view this site!");
                } else {
                    if(isset($_POST["abort"])){
                        header("Location:" . $this->getRoot() . "/thread/" . $result["threadID"] . "");
                    }
                    if(isset($_POST["delete"])){
                        $index->assign("hideForm", "hidden");
                        $this->model('Posts')->deletePost($id);
                        $this->success("Your post has been deleted successfully.");
                        header("Refresh:2 url=" . $this->getRoot() . "/thread/" . $result["threadID"] . "");
                    }
                }
            } else if($deleteMethod == "thread"){
                $index->assign("method","Thread");
                $results = $this->model('Threads')->getthread($id);
                foreach ($results as $result) {
                    $threadUser = $result["userID"];
                }
                if($threadUser != $_SESSION["userID"]){
                    $this->error("You are not allowed to view this site!");
                } else {
                    if(isset($_POST["abort"])){
                        header("Location:" . $this->getRoot() . "/thread/" . $result["threadID"] . "");
                    }
                    //$this->model('Threads')->deleteThread($id);
                }
            }
        }
        $this->setView();
    }
}
?>
