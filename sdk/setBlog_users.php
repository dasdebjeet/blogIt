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


    if(isset($_REQUEST["fetch_searchUser"]) == "blog_searchUser"){
        $search_val = $_POST["search_val"];
        $role_val = $_POST["role_val"];
        $status_val = $_POST["status_val"];

        $obj = new user;

        $result = $obj->get_searchUser($search_val, $role_val, $status_val);
        $result = json_encode($result);
        if($result){
            header('Content-Type: application/json');
            echo $result;
        }else{
            echo "couldn't fetch users!";
        }

        // echo $search_val."\n".$role_val."\n".$status_val;
    }

?>
