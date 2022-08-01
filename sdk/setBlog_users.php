<?php
    require_once "getblog_users.php";

    if(isset($_POST["fetch_userId"]) == "blog_userId"){
        $obj = new user;

        $result = $obj->get_userId();
        // $results = json_decode($result);
        if($result){
            // for($i=0; $i<sizeof($results); $i++){
            //     // echo $results[$i]->user_id.' - '.$results[$i]->user_name."\t\t\t\t";
            //     echo $results[$i];
            // }
            header('Content-Type: application/json');
            echo $result;
        }else{
            echo "couldn't fetch users!";
        }
    }


    if(isset($_POST["fetch_userData"]) == "blog_userData"){

        $obj = new user;

        $result = $obj->get_userData($_POST["userId"]);
        if($result){
            $result = json_encode($result);
            echo $result;
        }else{
            echo "couldn't fetch users!";
        }
    }
?>
