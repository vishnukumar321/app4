<?php
include_once "lib/load.php";
if(isset($_GET['a'])){
    if($_GET['a']=="clear"){
        $result=session::delete_sessionn();
        if($result){
            header('location:index.php');
        }
    }
}
if(isset($_SESSION['token'])){
    $result=session::authorize($_SESSION['token']);
    if($result){

    }else{
        session::delete_sessionn();
        header('location:index.php');
    }
}
if(isset($_SESSION['signup'])){
    ?><script>alert('Please login')</script><?php
}
get_file('__head');
get_file('__header');
get_file('__main');
get_file('__footer')
?>

