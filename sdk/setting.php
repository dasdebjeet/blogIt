<?php

class database{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    protected function connect(){
        $this->host = 'localhost';
        $this->username = 'root' ;
        $this->passsword = '';
        $this->dbname = 'blog_db';
        $this->charset = 'utf8';
        try{
            $db = "mysql:host=".$this->host.";dbname=".$this->dbname.";charset".$this->charset;
            $conn = new PDO($db, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            die("Can't connect to ".$e->getMessage());
        }
    }
}

/*
class getData extends database{
    public function users(){
        $stmt = $this->connect()->prepare("select * from users");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }
}
$obj = new getData;
$users = $obj->users();
$users = json_decode($users);
for($i=0; $i<sizeof($users); $i++){
    echo $users[$i]->user_id.' - '.$users[$i]->user_name;
}
*/
?>
