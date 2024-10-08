<?php 
include_once "database.php";
session_start();
$result=false;
$njan=false;
if(isset($_POST['uname']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['pass'])){
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $pass=$_POST['pass'];
    $sql="INSERT INTO `signup` (`username`, `email`, `phone`, `password`, `blocked`, `active`)
VALUES ('$uname', '$email', '$phone', '$pass', NULL, NULL);";
    $conn=database::get_conn();
    if($conn->query($sql)===true){
        $_SESSION['name']=$uname;
        echo $_SESSION['name'];
        $result=true;

       
    }
    $njan=true;
    
}
if($njan){
    if($result){

        echo "recorded";
    }else{
        echo "fail";

    }

}
    ?>
    <style>
        input,label{
            padding: 8px;
        }
        th.tr{
            margin: 2px;
        }
        .nale:hover{
            background-color: black;
            color: white !important;
            
        }
        .nale{
            padding: 8px;
        }
        .m:hover{
           
            border-radius: 30px;
        }.m{
            border: 2px solid black;
            margin: 4px;
            padding: 5.5px;
            transition: 0.5s;
        }
    </style>
<center>
<form action="database_testing.php" method="post">
    <table border="1">
        <tr>
            <td><label>Enter username:</label></td>
            <td><input type="text" name="uname" placeholder="username" autocomplete="off" required></td>
        </tr>
        <tr>
            <td><label>Enter email:</label></td>
            <td><input type="email" name="email" placeholder="email" required></td>
        </tr>
        <tr>
            <td><label>Enter phone no:</label></td>
            <td><input type="tel" name="phone" placeholder="phone no" required></td>
        </tr>
        <tr>
            <td><label>Enter password:</label></td>
            <td><input type="password" name="pass" placeholder="password" required></td>
        </tr>
        <tr>
            <td style="padding: 8px;"><a class="m" style="text-decoration: none;" href="njan.php">show the records</a></td>
            <td style="padding: 5px;"><input class="nale" type="submit"></td>
        </tr>
    </table>
    
</form>
</center><?php

