<?php
include_once 'lib/load.php';
class user{
    public $conn;
    public $id;
    public $username;
    public function __construct($username)
    {
        echo $username."<br>";
        if(!$this->conn){
            $this->conn=database::get_conn();
        }
        $sql="SELECT * FROM `signup` WHERE `username` = '$username' OR `id` = '$username'";
        $result=$this->conn->query($sql);
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            $this->id=$row['id'];
            $this->username=$row['username'];
        }else{
            throw new Exception('user->__construct()->function error');
        }
    }
    public static function login($email,$pass){
        $conn=database::get_conn();
        $sql="SELECT * FROM `signup` WHERE `username` = '$email' OR `email` = '$email'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            if(password_verify($pass, $row['password'])){
                return $row['username'];
            }else{
                return false;
            }
        }else{
            return false;
        }

    }
    public static function signup($name,$email,$phone,$pass){
        $conn=database::get_conn();
        $pass=password_hash($pass,PASSWORD_BCRYPT);
        $sql="INSERT INTO `signup` (`username`, `email`, `phone`, `password`)
VALUES ('$name', '$email', '$phone', '$pass');";
        if($conn->query($sql)==true){
            return true;
        }else{
            return false;
        }
    }
    public static function profile($username){
        $user=new user($username);
        $id=$user->getid();
        $conn=database::get_conn();
        if($user->id==$id){
            return true;
        }else{
            $sql="INSERT INTO `profile` (`id`, `avatar`, `first_name`, `last_name`, `bio`, `date`, `facebook`, `insta`, `linkedin`)
VALUES ('$user->id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
        if($conn->query($sql)){
            return true;
        }else{
            return false;
        }
        }
    }
    public function __call($name, $arguments)
    {

        if(substr($name,0,3)=="get"){
            $name=substr($name,3);
            return $this->getdata($name);
        }elseif(substr($name,0,3)=="set"){
            $name=substr($name,3);
            return $this->setdata($name,$arguments);
        }

    }
    public function getdata($name){
        if(!$this->conn){
            $this->conn=database::get_conn();
        }
        $conn=$this->conn;
        $id=$this->id;
        $sql="SELECT * FROM `profile` WHERE `id` = '$id'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            if(isset($row[$name])){
                if($row[$name]==NULL){

                }else{
                    return $row[$name];
                }
            }else{
                return false;
                throw new Exception('user->getdata error not found name->'.$name);
            }
        }else{
            return false;
        }

    }
    public function setdata($name,$arguments){

    }
}