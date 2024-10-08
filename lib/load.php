<?php
include_once "templates/user.php";
include_once "templates/database.php";
include_once "templates/user_session.php";
session_start();
global $_file_content;
$_file_content=file_get_contents($_SERVER['DOCUMENT_ROOT']."/app3config.json");
function get_conf($key){
    global $_file_content;
    $arr=json_decode($_file_content,true);
    if(isset($arr[$key])){
        return $arr[$key];
    }else{
        return null;
    }
}
function get_page($name){
    include $_SERVER['DOCUMENT_ROOT']."/app4/templates/$name.php";
}