
<?php
include_once 'lib/load.php';
$result=false;
$show=false;
if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['pass'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $pass=$_POST['pass'];
    $signup=user::signup($name,$email,$phone,$pass);
    $result=true;
}
if($result){
    if($signup){
        $_SESSION['signup']=1;
        header('location:index.php');
    }else{
        $show=true;
    }
}    
    get_file('__header');
    ?>
    <div class="body">
        <center>
            <form action="signup.php" method="post" class="sign">
                <table>
                    <tr>
                        <td>
                            <h2 style="text-align: center;margin-bottom:20px">Signup</h2>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" name="name" placeholder="Username" required></td>
                    </tr>
                    <tr>
                        <td><input type="email" name="email" placeholder="Email" required></td>
                    </tr>
                    <tr>
                        <td><input type="tel" name="phone" placeholder="Phone" required></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="pass" placeholder="Password" required></td>
                    </tr>
                    <?php if($show){
                        ?><tr>
                            <td><p style="color: red;">Email or Username is already used</p></td>
                        </tr><?php
                        }?>
                    <tr style="text-align: center;">
                        <td><button class="submit">Signup</button></td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
