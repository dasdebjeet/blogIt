<?php
    require_once 'setting.php';

    class user extends database{

        public function get_userBlogId($result, $rec_limit, $total_user_rec, $total_page){
            $arr = $result; 
            if($result){                         
                for($i=0; $i<sizeof($result); $i++){                
                    $user_id = $result[$i]["user_id"];                    
                    $stmt = $this->connect()->prepare("SELECT COUNT(blog.blog_id) as pubBlog_count FROM `blog` LEFT JOIN `users` ON blog.author_id=users.user_id WHERE blog.author_id=? AND blog.blog_status='publish'");
                    $stmt->execute([$user_id]);
                    $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);       
                    $arr[$i]['pubBlog_count'] = $result2[0]['pubBlog_count'];
                }              
                return json_encode(['arr' => $arr, 'limit' => $rec_limit, 'total_users' => $total_user_rec, 'total_page' => $total_page]);
            }else{
                return FALSE;
            }
            echo $arr;
        }



        public function get_userId($offest){
            $rec_limit = 2;

            $stmt1 = $this->connect()->prepare("SELECT users.user_id, users.user_img, users.user_name, users.role, users.last_seen, users.status FROM `users` ORDER BY users.role='admin' DESC, users.status='active'");
            $stmt1->execute();
            $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);


            $stmt2 = $this->connect()->prepare("SELECT users.user_id, users.user_img, users.user_name, users.role, users.last_seen, users.status FROM `users` ORDER BY users.role='admin' DESC, users.status='active' DESC LIMIT $offest, $rec_limit");
            $stmt2->execute();
            $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            
            $total_user_rec = sizeof($result1);
            $total_page = ceil($total_user_rec/$rec_limit);

            // return ("rec = ".$total_user_rec."\nlim = ".$rec_limit."\npages = ".$total_page."\n");


            return $this->get_userBlogId($result2, $rec_limit, $total_user_rec, $total_page);
        }



        public function get_searchUser($search_val, $role_val, $status_val){
 
            // without name + all
            if ($search_val == "" && $role_val == "all" && $status_val == "all") {
                $stmt = $this->connect()->prepare("SELECT users.user_id, users.user_img, users.user_name, users.role, users.last_seen, users.status FROM `users` WHERE users.user_name LIKE '%".$search_val."%' ORDER BY users.role='admin' DESC, users.status='active' DESC");
            }

            // without name + role
            if ($role_val != "all" && $status_val == "all") {
                $stmt = $this->connect()->prepare("SELECT users.user_id, users.user_img, users.user_name, users.role, users.last_seen, users.status FROM `users` WHERE users.user_name LIKE '%".$search_val."%' AND users.role='".$role_val."' ORDER BY users.role='admin' DESC, users.status='active' DESC");
            }

            // without name + status
            if ($role_val == "all" && $status_val != "all") {
                $stmt = $this->connect()->prepare("SELECT users.user_id, users.user_img, users.user_name, users.role, users.last_seen, users.status FROM `users` WHERE users.user_name LIKE '%".$search_val."%' AND users.status='".$status_val."' ORDER BY users.role='admin' DESC, users.status='active' DESC");
            }

            // without name + role + status
            if ($role_val != "all" && $status_val != "all") {
                $stmt = $this->connect()->prepare("SELECT users.user_id, users.user_img, users.user_name, users.role, users.last_seen, users.status FROM `users` WHERE users.user_name LIKE '%".$search_val."%' AND users.status='".$status_val."' AND users.role='".$role_val."' ORDER BY users.role='admin' DESC, users.status='active' DESC");
            }

            // with name + all
            if ($search_val != "" && $role_val == "all" && $status_val == "all") {
                $stmt = $this->connect()->prepare("SELECT users.user_id, users.user_img, users.user_name, users.role, users.last_seen, users.status FROM `users` WHERE users.user_name LIKE '%".$search_val."%' ORDER BY users.role='admin' DESC, users.status='active' DESC");
            }



            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


            $rec_limit = 4;
            $total_user_rec = sizeof($result);
            $total_page = ceil($total_user_rec/$rec_limit);

            // echo "rec = ".$total_user_rec."\nlim = ".$rec_limit."\npages = ".$total_page."\n";


            return $this->get_userBlogId($result, $rec_limit, $total_user_rec, $total_page);
        }
    }
?>
