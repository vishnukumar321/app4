<?php
include_once "lib/load.php";
class session{
    public static $id;
    public $conn;
    public $data;
    public function __construct($token)
    {
        if(!$this->conn){
            $this->conn=database::get_conn();
        }
        $conn=$this->conn;
        $sql="SELECT * FROM `session` WHERE `token` = '$token'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            $this->data=$row;
        }
        
    }
    public static function authentication($email,$pass){
        $conn=database::get_conn();
        $username=user::login($email,$pass);
        $user=new user($username);
        session::$id=$user->id;
        if($username){
            $ip=$_SERVER['REMOTE_ADDR'];
            $agent=$_SERVER['HTTP_USER_AGENT'];
            $token=md5(rand(0,999999).$ip.$agent.time());
            $sql="INSERT INTO `session` (`id`, `ip`, `agent`, `token`, `time`, `active`)
VALUES ('$user->id', '$ip', '$agent', '$token', now(), '1');";
            if($conn->query($sql)){
                $_SESSION['token']=$token;
                return $username;
            }else{
                return false;
            }
            return $username;
        }else{
            return false;
        }
    }
    public static function authorize($token){
        $session=new session($token);
        try{
            if(isset($_SESSION['token'])){
                if($_SESSION['token']==$session->gettoken()){
                    if($session->isactive() and $session->isvalid()){
                        if($_SERVER['REMOTE_ADDR']==$session->getip()){
                            if($_SERVER['HTTP_USER_AGENT']==$session->getagent()){
                                return true;
                            }else{
                                throw new Exception('session->authorize->user agent is diffrent');
                            }
                        }else{
                            throw new Exception('session->authorize->ip is diffrent');
                        }
                    }else{
                        throw new Exception('session->authorize->session is unvalid');
                    }
                }else{
                    throw new Exception('session->authorize->user token is diffrent');
                }
            }else{
                throw new Exception('session->authorize->user token not seted');
            }
        }
        catch(Exception $a){
            return false;
        }

    }
    public static function delete_sessionn(){
        $conn=database::get_conn();
        $session=new session($_SESSION['token']);
        $id=$session->data['id'];
        $sql="DELETE FROM `session`
WHERE `id` = '$id';";
        if($conn->query($sql)){
            session_destroy();
            return true;
        }else{
            return false;
        }
    }
    public function getip(){
        return $this->data['ip'];
    }
    public function getagent(){
        return $this->data['agent'];
    }
    public function gettoken(){
        return $this->data['token'];
    }
    public function isvalid(){
        date_default_timezone_set('asia/kolkata');
        $date=strtotime($this->data['time']);
        $dif=time()-$date;
        if(3600>$dif){
            return true;
        }else{
            return false;
        }
    } 
    public function isactive(){
        if($this->data['active']==1){
            return true;
        }else{
            return false;
        }
    }
    public function getusername(){
        $id=$this->data['id'];
        $username=new user($id);
        return $username->username;
    }

}