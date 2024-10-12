<?php
include_once 'template/__database.php';
include_once 'template/__user.php';
include_once 'template/__user_session.php';
session_start();
global $json;
$json=file_get_contents($_SERVER['DOCUMENT_ROOT']."/app3config.json");
function get_conf($name){
    global $json;
    $arr=json_decode($json,true);
    if(isset($arr[$name])){
        return $arr[$name];
    }else{
        return false;
    }


}
function get_file($name){
    include $_SERVER['DOCUMENT_ROOT']."/app4/template/$name.php";
}