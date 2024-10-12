<?php
include_once "lib/load.php";
$result=false;
$login=false;
$error=false;
if (isset($_POST['email']) and isset($_POST['pass'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $username = session::authentication($email, $pass);
    $profile=new user($username);
    $p=$profile->profile($username);
    if($p==true and $username==true){
        $login=true;
    }
    $result = true;
} 
if($result){
    if($login){
        if(isset(($_SESSION['signup']))){
            unset($_SESSION['signup']);
        }
        header('location:index.php');
    }else{
        $error=true;
    }
}
    get_file('__header');
?>
    <div class="body">
        <center>
            <form action="login.php" method="post" class="sign">
                <table>
                    <tr>
                        <td>
                            <h2 style="text-align: center;margin-bottom:20px">Login</h2>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" placeholder="Email or username" required></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="pass" placeholder="Password" required></td>
                    </tr>
                    <?php if($error){
                        ?><tr>
                        <td><p style="color: red;text-align:center;">Invalid email or password !</p></td>
                    </tr><?php
                        }?>
                    <tr style="text-align: center;">
                        <td><button class="submit">Login</button></td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
