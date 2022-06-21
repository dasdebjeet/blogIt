<?php
    require_once "getblog_handler.php";

    if(isset($_POST["create_blog"]) == "yes"){
        
        $title = $_POST["title"];
        $subtitle = $_POST["subtitle"];
        $catagories = $_POST["catagories"];
        $tags = $_POST["tags"];
        $thumbnail_url = $_POST["thumbnail_url"];
        $content = $_POST["content"];
        $username = $_POST["username"];
        $blog_btn_val = $_POST["blog_stat"];


        if($_POST["user_priority"] == "0" && $blog_btn_val == "submit"){
            $blog_status = "verify";
        }else{
            $blog_status = ($blog_btn_val == "submit") ? "publish" : $blog_btn_val;
        }


        $obj = new blog;
        $result = $obj->createNew_blog($title, $subtitle, $catagories, $tags, $thumbnail_url, $content, $username, $blog_status);
        if($result){
            echo $result;
        } 
    }
?>
