<?php
include_once "lib/load.php";
class database{
    public static $conn;
    public static function get_conn(){
        if(database::$conn==null){
            $sname=get_conf('servername');
            $uname=get_conf('susername');
            $pass=get_conf('password');
            $db=get_conf('dbname');
            $conn= new mysqli($sname,$uname,$pass,$db);
            if($conn->connect_errno){
                die("connetion faild".$conn->connect_errno);
            }else{
                database::$conn=$conn;
                return database::$conn;
            }
        
        }else{
            return database::$conn;
        }
    }
}