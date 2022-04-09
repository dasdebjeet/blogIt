<?php
    require_once 'setting.php';

    class blog extends database{
        public function show_blog(){
            $stmt = $this->connect()->prepare("SELECT * FROM `blog`");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                return json_encode($result);
            }else{
                return FALSE;
            }
        }
        
        public function blog_author($author_id){
            $stmt = $this->connect()->prepare("SELECT user_name FROM users WHERE user_id=? LIMIT 1");
            $stmt->execute([$author_id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                return json_encode($result);
            }else{
                return FALSE;
            }
        }
    }
?>
