<?php
    require_once "../sdk/blog_fetcher_get.php";
    $obj = new blog;

    
    $result = $obj->show_blog();
    if($result){
        // $results = json_decode($result);
        // echo "Welcome ".$results[0]->user_name;
        header('Content-Type: application/json');
        echo $result;
        // echo "Logedin";
        // echo "<script> usrImg_el('".$results[0]->user_img."') </script>";
        // echo "<script> usrImg_el('".$results[0]->user_img."')</script>";
    }else{
        echo "fuck";
    }
?>
