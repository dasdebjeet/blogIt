<?php
    require_once "../sdk/blog_fetcher_get.php";


    
    if(isset($_POST["blog_fetch"]) == "blog_data"){
        $obj = new blog;

        
        $result = $obj->show_blog();
        if($result){
            header('Content-Type: application/json');
            echo $result;
        }else{
            echo "couldn't fetch blog!";
        }
    }

    if(isset($_POST['author_id'])){
        $obj = new blog;

        $auth_id = $_POST["author_id"];
        $result = $obj->blog_author($auth_id);

        if($result){
            header('Content-Type: application/json');
            echo $result;
        }else{
            echo "couldn't find author-id!";
        }
    }


?>
