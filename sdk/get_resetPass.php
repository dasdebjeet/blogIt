<?php
    require_once "setting.php";

    class reset_password extends database{
        public function tokenChecker($token){
            $stmt = $this->connect()->prepare("SELECT user_name, email FROM `users` WHERE token=?");
            $stmt->execute([$token]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function emailChecker($email){
            $stmt = $this->connect()->prepare("SELECT user_name, email FROM `users` WHERE email=?");
            $stmt->execute([$email]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                $data = json_encode($result);
                return $data;
            }else{
                return FALSE;
            }
        }

        public function set_token($token, $user_email){
            $stmt = $this->connect()->prepare("UPDATE `users` SET token=? WHERE email=? LIMIT 1");
            $flag = $stmt->execute([$token, $user_email]);
            if($flag){
                return "A token has been generated against your password";
            }else{
                return FALSE;
            }
        }

        public function reset_token($token){
            $stmt = $this->connect()->prepare("UPDATE `users` SET token=? WHERE token=? LIMIT 1");
            $flag = $stmt->execute(['NULL', $token]);
            if($flag){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function update_password($user_newPassword, $token){
            $new_password = password_hash($user_newPassword, PASSWORD_BCRYPT);

            $stmt = $this->connect()->prepare("UPDATE `users` SET users.password=? WHERE token=? LIMIT 1");
            $stmt->execute([$new_password, $token]);
            $flag = $stmt->rowCount();
            if($flag == 1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }
?>
