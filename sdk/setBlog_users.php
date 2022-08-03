<?php
    require_once "getblog_users.php";

    if(isset($_REQUEST["fetch_userId"]) == "blog_userId"){
        $obj = new user;

        $result = $obj->get_userId();
        $result = json_encode($result);
        if($result){
            header('Content-Type: application/json');
            echo $result;
        }else{
            echo "couldn't fetch users!";
        }
    }

?>
