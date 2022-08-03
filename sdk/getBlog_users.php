<?php
    require_once 'setting.php';

    class user extends database{
        public function get_userId(){
            $stmt = $this->connect()->prepare("SELECT users.user_id, users.user_img, users.user_name, users.role, users.last_seen, users.status FROM `users` ORDER BY users.role='admin' DESC, users.status='active' DESC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $arr = $result;
            if($result){                         
                for($i=0; $i<sizeof($result); $i++){                
                    $user_id = $result[$i]["user_id"];                    
                    $stmt = $this->connect()->prepare("SELECT COUNT(blog.blog_id) as pubBlog_count FROM `blog` LEFT JOIN `users` ON blog.author_id=users.user_id WHERE blog.author_id=? AND blog.blog_status='publish'");
                    $stmt->execute([$user_id]);
                    $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);       
                    $arr[$i]['pubBlog_count'] = $result2[0]['pubBlog_count'];
                }              
                return $arr;
            }else{
                return FALSE;
            }
        }
    }
?>
