<?php
    require_once "setting.php";

    class login_signup extends database{
        public function emailChecker($email){
            $stmt = $this->connect()->prepare("SELECT email FROM `users` WHERE email=? LIMIT 1");
            $stmt->execute([$email]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function usernameChecker($username){
            $stmt = $this->connect()->prepare("SELECT user_name FROM `users` WHERE user_name=? LIMIT 1");
            $stmt->execute([$username]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function newSignup($user_name, $name, $email, $password, $role, $priority, $status, $cookie_set){
            $stmt = $this->connect()->prepare("INSERT INTO `users` (`user_id`, `user_name`, `name`, `email`, `password`, `role`, `priority`, `status`, `last_seen`, `joining_date`, `cookie_set`, `token`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(), ?, NULL)");
            $flag = $stmt->execute([$user_name, $name, $email, $password, $role, $priority, $status, $cookie_set]);
            if($flag){
                return TRUE;
            }
        }
        
        public function cookieUpdater($cookie_set, $user_name){
            $stmt = $this->connect()->prepare("UPDATE `users` SET cookie_set=? WHERE user_name=? LIMIT 1");
            $stmt->execute([$cookie_set, $user_name]);
            $flag = $stmt->rowCount();
            if($flag == 1){
                // return TRUE;
                $stmt = $this->connect()->prepare("SELECT name, user_name, user_img FROM `users` WHERE user_name=? AND cookie_set=? LIMIT 1");
                $stmt->execute([$user_name, $cookie_set]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if($result){
                    return json_encode($result);
                }else{
                    return FALSE;
                }
            }
        }

        public function cookieChecker($cookie_set){
            $stmt = $this->connect()->prepare("SELECT name, user_id, user_name, user_img, role, priority FROM `users` WHERE cookie_set=? LIMIT 1; UPDATE `users` SET last_seen=CURRENT_TIMESTAMP() WHERE cookie_set=? LIMIT 1");

            $stmt->execute(array($cookie_set, $cookie_set));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                return json_encode($result);
            }else{
                return FALSE;
            }
        }

        public function login($user_name, $password){
            $stmt = $this->connect()->prepare("SELECT `password` FROM `users` WHERE user_name=? LIMIT 1");
            $stmt->execute([$user_name]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                $results = json_encode($result);
                $results = json_decode($results);        
                // for($i=0; $i<sizeof($results); $i++){
                $hash = $results[0]->password;
                // }


                $verify = password_verify($password, $hash);

                if ($verify) {
                    $stmt = $this->connect()->prepare("SELECT * FROM `users` WHERE user_name=? LIMIT 1; UPDATE users SET last_seen=CURRENT_TIMESTAMP WHERE user_name=? AND password=? LIMIT 1;");
                    $stmt->execute([$user_name, $user_name, $password]);
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $resultJSON = json_encode($result);
                    return $resultJSON;
                } else {
                    header('Content-Type: application/json');
                    $data = '{"status": "Incorrect Password!", "result": ""}';
                    $data = json_encode($data);
                    echo $data;
                }
            }else{
                header('Content-Type: application/json');
                $data = '{"status": "Incorrect Username!", "result": ""}';
                $data = json_encode($data);
                echo $data;
            }               
        }        
        
        public function newLogin($user_name, $password, $cookie_set){
            return $this->cookieChecker($user_name, $cookie_set);
        }


    }
?>
