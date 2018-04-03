<?php 

class tpl{
    public function load($template){
        require_once($template.".php");
    }

    public function show($template){
        include($template.".php");
    }
}

?>