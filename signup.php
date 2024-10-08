<?php
include_once "lib/load.php";
$signup=false;
if (isset($_POST['username']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['password'])) {
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    $result = user::signup($uname, $email, $phone, $pass);
    $signup = true;
}
if ($signup) {
    if ($result) {
        header('location:index.php');
    } else {
        print("please try again..<br>click");
        ?>
        <a href="signup.php">here</a><?php

    }
} else {
    get_page('head');
    get_page('header');
?>

<pre style="height: 70vh;display:flex;justify-content:center;align-items:center;">
<center>
<form method="post" action="signup.php" style="padding: 13px;border:2px solid white;border-radius:23px">
<table>
    <tr>
        <td>Username:</td>
        <td><input name="username" type="text" placeholder="username" required></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><input name="email" type="email" placeholder="email" required></td>
    </tr>
    <tr>
        <td>Phone:</td>
        <td><input name="phone" type="tel" placeholder="phone no" required></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><input name="password" type="password" placeholder="password" required></td>
    </tr>
    <tr>
        <td><input type="submit"></td>
        <td><input type="reset"></td>
    </tr>
</table>
</form>
</center>
</pre>
<?php
get_page('footer');
    }
