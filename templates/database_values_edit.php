<?php
include "database.php"; 

$conn=database::get_conn();
if(isset($_POST['save'])){
    $id_data=$_POST['save'];
    $uname=$_POST['uname'];
    $email=$_POST['email']; 
    $phone=$_POST['phone'];
    $pass=$_POST['pass'];
    $data="UPDATE `signup` SET
`username` = '$uname',
`email` = '$email',
`phone` = '$phone',
`password` = '$pass'
WHERE `id` = '$id_data';";
if($conn->query($data)==true){
    header('location:njan.php');

}else{
    echo "not recorded";
}
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM `signup` WHERE `id` = '$id';";
    $result=$conn->query($sql);
    if($result->num_rows==1){
        $row=$result->fetch_assoc();
        ?>
<center>
<form action="database_values_edit.php" method="post">
    <table border="1">
        <tr>
            <td><label>Enter username:</label></td>
            <td><input type="text" name="uname" placeholder="username" required value="<?= $row['username']?>"></td>
        </tr>
        <tr>
            <td><label>Enter email:</label></td>
            <td><input type="email" name="email" placeholder="email" required value="<?= $row['email']?>"></td>
        </tr>
        <tr>
            <td><label>Enter phone no:</label></td>
            <td><input type="tel" name="phone" placeholder="phone no" required value="<?= $row['phone']?>"></td>
        </tr>
        <tr>
            <td><label>Enter password:</label></td>
            <td><input type="password" name="pass" placeholder="password" required value="<?= $row['password']?>"></td>
        </tr>
        <tr>
            <td style="padding: 8px;"><button class="m"><a style="text-decoration: none;" href="njan.php">show the records</a></button></td>
            <input name="save" type="hidden" value="<?= $row['id']?>">
            <td style="padding: 5px;"><input type="submit" value="save"></td>
        </tr>
    </table>
    
</form>
</center><?php
    }

}

