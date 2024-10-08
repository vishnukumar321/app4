<?php
include_once "lib/load.php";
class usersession{
    public $id;
    public $conn;
    public $data;
    public function __construct($token){
        if(!$this->conn){
            $this->conn=database::get_conn();
        }
        $conn=$this->conn;
        $sql="SELECT * FROM `session` WHERE `token` = '$token'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            $this->id=$row['id'];
            $this->data=$row;
            return true;
        }else{
            return false;
        }
    }
    public static function authenticate($email,$pass){
        $uid=user::login($email,$pass);
        if($uid){
            $conn=database::get_conn();
            $ip=$_SERVER['REMOTE_ADDR'];
            $agent=$_SERVER['HTTP_USER_AGENT'];
            $token=md5(rand(0,999999).$agent.$ip.time());
            $sql="INSERT INTO `session` (`id`, `ip`, `agent`, `token`, `time`, `active`)
VALUES ('$uid', '$ip', '$agent', '$token', now(), '1');";
            if($conn->query($sql)==true){
                echo "poda";
                $_SESSION['user_token']=$token;
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public static function authorize($token){
        $verify=new usersession($token);
        try{
            if($token==$verify->data['token']){
                if($verify->isactive() and $verify->isvalid()){
                    if($_SERVER['REMOTE_ADDR']==$verify->data['ip']){
                        if($_SERVER['HTTP_USER_AGENT']==$verify->data['agent']){
                            return true;
                        }else{
                            throw new Exception('wrong useragent,i thing useragent is changed');
                        }
                    }else{
                        throw new Exception('ip is changed');
                    }
                }else{
                    throw new Exception('session is expired');
                }
            }else{
                throw new Exception('session_token changed');
            }

        }
        catch(Exception $a){
            return false;

        }
    }
    public function getagent(){
        return $this->data['agent'];

    }
    public function getip(){
        return $this->data['ip'];

    }
    public function isvalid(){
        if($this->data['time']){
            date_default_timezone_set('asia/kolkata');
            $time=strtotime($this->data['time'])+60*60;
            $now=time();
            if($now<$time){
                return true;
            }else{
                return false;
            }


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
    public function delete_session(){
        if(!$this->conn){
            $this->conn=database::get_conn();
        }
        $id=$this->id;
        $sql="DELETE FROM `session`
WHERE ((`id` = '$id'));";
        $conn=$this->conn;
        if($conn->query($sql)==true){
            session_destroy();
            
            
        }else{
            session_destroy();
        }

    }
}