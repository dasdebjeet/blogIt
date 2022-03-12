<?php
    // logout

    function reset_cookie(){
        unset($_COOKIE['oreo_blogW']);
        setcookie('oreo_blogW', '', time() - 3600, '/');
    }
    if(isset($_COOKIE['oreo_blogW'])){
        require_once "../sdk/getLogin_signup.php";
        $obj = new login_signup;
        
        $result = $obj->cookieChecker($_COOKIE['oreo_blogW']);
        if($result){
            // $results = json_decode($result);
            // echo "Welcome ".$results[0]->user_name;
            header('Content-Type: application/json');
            echo $result;
            // echo "Logedin";
            // echo "<script> usrImg_el('".$results[0]->user_img."') </script>";
            // echo "<script> usrImg_el('".$results[0]->user_img."')</script>";
        }else{
            // header('Content-Type: application/json');
            echo "You logged in from a new device! Please login";
            // reset_cookie();
        }
    }
    else{
        // header('Content-Type: application/json');
        echo "New user"; // new user login
        // reset_cookie();
    }
    // echo "yo bal";
?>
