<?php
    require_once "getblog_users.php";

    if(isset($_POST["user_fetch"]) == "blogUsers_data"){
        $obj = new user;

        $result = $obj->show_users();
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
?>
