<?php
    require_once "setting.php";

    class blog extends database{
        public function createNew_blog($title, $subtitle, $catagories, $tags, $thumbnail_url, $content, $username, $blog_status){

            $stmt = $this->connect()->prepare("SELECT user_id FROM `users` WHERE user_name=? LIMIT 1");
            $stmt->execute([$username]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                $results = json_encode($result);
                $results = json_decode($results);        
                $author_id = $results[0]->user_id;


                // echo $author_id;
                $stmt = $this->connect()->prepare("INSERT INTO `blog`(`blog_id`, `title`, `subtitle`, `catagories`, `tags`, `thumbnail_url`, `content`, `author_id`, `likes`, `dislikes`, `comment`, `veiws`, `shares`, `written_on`, `published_on`, `edited_on`, `blog_status`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, 0, 0, 0, 0, 0, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(), ?)");
                $flag = $stmt->execute([$title, $subtitle, $catagories, $tags, $thumbnail_url, $content, $author_id,  $blog_status]);
                if($flag){
                    return TRUE;
                }
            }else{
                return FALSE;
            }

           
        }
    }
?>
