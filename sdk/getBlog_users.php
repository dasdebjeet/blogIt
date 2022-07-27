<?php
    require_once 'setting.php';

    class user extends database{
        public function show_users(){
            $stmt = $this->connect()->prepare("SELECT users.user_id, users.user_img, users.user_name, users.role, users.last_seen, users.status FROM `users`");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                return json_encode($result);
            }else{
                return FALSE;
            }
        }
    }
?>
