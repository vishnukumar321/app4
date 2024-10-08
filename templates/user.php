<?php
include_once "lib/load.php";
class user
{
    public $conn;
    public $id;
    public function __construct($id){
        if(!$this->conn){
            $this->conn=database::get_conn();
            $conn=$this->conn;
        }
        $sql="SELECT `id` FROM `signup` WHERE `id` = '$id' OR `username` = '$id'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            $this->id=$row['id'];
        }else{
            throw new Exception('username or id is not found');
        }

    }

    public static function signup($uname, $email, $phone, $pass)
    {
        $conn = database::get_conn();
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `signup` (`username`, `email`, `phone`, `password`, `blocked`, `active`)
VALUES ('$uname', '$email', '$phone', '$pass', NULL, NULL);";
        if ($conn->query($sql) === true) {
            $_SESSION['username']=$uname;
            $_SESSION['signup']=1;
            
            return true;
        }else {
            return false;
        }
    }
    public static function login($email, $pass)
    {
        $conn = database::get_conn();
        $sql = "SELECT * FROM `signup` WHERE `email` = '$email';";
        $result = $conn->query($sql);
        if ($result->num_rows == true) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                // $_SESSION['uid'] = $row['id'];
                $data= user::profile_data($row['id']);
                if($data){
                    return $row['id'];
                }else{
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function __call($name, $arguments)
    {
        if(substr($name,0,3)=='get'){
            $name=substr($name,3);
            return $this->get($name);

        }elseif(substr($name,0,3)=='set'){
            $name=substr($name,3);
            return $this->set($name,$arguments[0]);

        }
    }
    public function get($name){
        $conn=$this->conn;
        $sql="SELECT `$name` FROM `profile` WHERE `id` = '$this->id'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            return $row[$name];
        }else{
            return false;
        }
    }
    public function set($name,$arguments){
        $conn=$this->conn;
        $sql="UPDATE `profile` SET `$name` = '$arguments' WHERE `id` = '$this->id';";
        if($conn->query($sql)){
            return true;
        }else{
            return false;
        }

    }
    public static function profile_data($id) {
        $conn=database::get_conn();
        $psql="SELECT `id` FROM `profile` WHERE `id` = '$id'";
        $result=$conn->query($psql);
        if($result->num_rows==1){
            return true;

        }else{
            $sql="INSERT INTO `profile` (`id`)
VALUES ('$id');";
        if($conn->query($sql)==1){
            return true;
        }else{
            return false;
        }
        }
    }
   
}

