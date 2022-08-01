<?php
    require_once 'setting.php';

    class user extends database{
        public function get_userId(){
            $stmt = $this->connect()->prepare("SELECT users.user_id FROM `users`");
            // $stmt = $this->connect()->prepare("SELECT users.user_id, users.user_img, users.user_name, users.role, users.last_seen, users.status, COUNT(blog_id) as pubBlog_count FROM `users` LEFT JOIN `blog` ON users.user_id = blog.author_id WHERE blog.blog_status = 'publish' GROUP BY author_id");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                return json_encode($result);
            }else{
                return FALSE;
            }
        }


        public function get_userData($user_id){
            $stmt = $this->connect()->prepare("SELECT users.user_id, users.user_img, users.user_name, users.role, users.last_seen, users.status FROM `users` WHERE users.user_id=?");
            $stmt->execute([$user_id]);
            $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);


            $stmt = $this->connect()->prepare("SELECT COUNT(blog.blog_id) as pubBlog_count FROM `blog` WHERE blog.author_id=? AND blog.blog_status = 'publish'");
            $stmt->execute([$user_id]);
            $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);          

            if($result1){
                $data = array($result1, $result2);
                return $data;
            }else{
                return FALSE;
            }
        }


    }
?>
