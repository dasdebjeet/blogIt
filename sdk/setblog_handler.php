<?php
    require_once "getblog_handler.php";

    if(isset($_POST["blog_status"]) == "submit"){
        
        $title = $_POST["title"];
        $subtitle = $_POST["subtitle"];
        $catagories = $_POST["catagories"];
        $tags = $_POST["tags"];
        $thumbnail_url = $_POST["thumbnail_url"];
        $content = $_POST["content"];
        $username = $_POST["username"];
        $blog_status = $_POST["blog_status"];


        // echo $_POST["thumbnail_url"];


        $obj = new blog;
        $result = $obj->createNew_blog($title, $subtitle, $catagories, $tags, $thumbnail_url, $content, $username, $blog_status);
        if($result){
            echo $result;
        } 
    }
?>
