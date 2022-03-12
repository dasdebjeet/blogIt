<?php
require_once "getLogin_signup.php";

if(isset($_POST['form_name'])){
    if($_POST['form_name'] == 'signup_form'){
        if(isset($_POST['name']) && isset($_POST['username'])){
            // $user_id = NULL;    
            $name = $_POST['name'];
            $user_name = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
            // Verify the hash against the password entered
            // $verify = password_verify($plaintext_password, $hash);
    
            // admin - 2
            // contributer - 1
            // newbie - 0
    
            $role = 'admin';
            $priority = 2;
            $status = 'active';
    
            date_default_timezone_set('Asia/Kolkata');
            $salt = date("d/m/Y_h:i:sa");
            $cookie_set = hash('sha1', $user_name.$salt);
    
            $cookie_name = "oreo_blogW";
            // setcookie("blogW_uname", $user_name, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($cookie_name, $cookie_set, time() + (86400 * 30), "/"); // 86400 = 1 day
    
    
            if($cookie_set){
                $obj = new login_signup;
                $result = $obj->newSignup($user_name, $name, $email, $password, $role, $priority, $status, $cookie_set);
                if($result){
                    echo "signup sucessful";
                }
            }else{
                echo "signup error occured";
            }
        }
    }
    
    if($_POST['form_name'] == 'login_form'){    
    
        if(isset($_POST['username']) && isset($_POST['password'])){
            $user_name = $_POST['username'];
            $password = $_POST['password'];
    
            function set_cookie($user_name){
                date_default_timezone_set('Asia/Kolkata');
                $salt = date("d/m/Y_h:i:sa");
                $cookie_set = hash('sha1', $user_name.$salt);
    
                $cookie_name = "oreo_blogW";
                // setcookie("blogW_uname", $user_name, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie($cookie_name, $cookie_set, time() + (86400 * 30), "/"); // 86400 = 1 day
    
                $obj = new login_signup;
                $result = $obj->cookieUpdater($cookie_set, $user_name);
                if($result){
                    header('Content-Type: application/json');
                    $data = '{"status": "new_oreo", "result": '.$result.'}';
                    $data = json_encode($data);
                    echo $data;
                } 
            }
    
            $obj = new login_signup;
            $result = $obj->login($user_name, $password);
            $results = json_decode($result);
            if($results){
                // for($i=0; $i<sizeof($results); $i++){
                //     echo $results[$i]->user_id.' - '.$results[$i]->user_name;
                // }
                if(isset($_COOKIE['oreo_blogW'])){
                    $cookie_set = $_COOKIE['oreo_blogW'];
                
                    $obj = new login_signup;
                    $result = $obj->newLogin($user_name, $password, $cookie_set);
                    if($result){
                        header('Content-Type: application/json');
                        $data = '{"status": "exi_oreo", "result": '.$result.'}';
                        $data = json_encode($data);
                        echo $data;
                    }else{
                        set_cookie($user_name);
                    }
                }else{
                    set_cookie($user_name);
                }
            }
        }else{
            header('Content-Type: application/json');
            $data = '{"status": "Incorrect credentials", "result": ""}';
            $data = json_encode($data);
            echo $data;
        }
    
    }
}
if(isset($_POST['inp_name'])){
    if($_POST['inp_name'] == 'email'){
        if(isset($_POST['inp_data'])){
            $obj = new login_signup;
            $result = $obj->emailChecker($_POST['inp_data']);
            if($result){
                echo $result;
            }else{
                echo "email not exist";
            }
        }
    }    
    
    if($_POST['inp_name'] == 'username'){
        if(isset($_POST['inp_data'])){
            $obj = new login_signup;
            $result = $obj->usernameChecker($_POST['inp_data']);
            if($result){
                echo $result;
            }else{
                echo "Username available";
            }
        }
    }    
}



?>
