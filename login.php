<?php
include_once "lib/load.php";
$login = false;
if (isset($_POST['email']) and isset($_POST['password'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $result=usersession::authenticate($email, $pass);

    $login = true;
}
if ($login) {
    if ($result) {
        unset($_SESSION['signup']);
        header('location:index.php');
    } else {
        echo "<center>";
        print("Wrong datas! please try again<br>click   ");
        ?><a href="login.php">HERE</a><?php
        echo "</center>";
    }
} else {
    get_page('head');
    get_page('header');
?>
    <pre style="height: 70vh;display:flex;justify-content:center;align-items:center;">
        <center>
            
        <form method="post" action="login.php" style="border: 2px solid white;padding:10px;border-radius:23px;display:flex;justify-content:space-around;">
        <table>
            <tr>
                <td>Email</td>
                <td><input name="email" type="email" placeholder="email" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input name="password" type="password" placeholder="password" required></td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="2"><input type="submit"></td>
            </tr>
            </table>
</form>

        </center>
</pre><?php
        get_page('footer');
    }
