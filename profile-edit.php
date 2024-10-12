<?php
include_once "lib/load.php";
get_file('__head');
$sesion=new session($_SESSION['token']);
$name=$sesion->getusername();
$username=new user($name);
if(isset($_SESSION['username'])){
    $username=new user($_SESSION['username']);
}
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $bio=$_POST['bio'];
    $dob=$_POST['dob'];
    $web=$_POST['linkedin'];
    $insta=$_POST['insta'];
    $facebook=$_POST['facebook'];
    $conn=database::get_conn();
    $sql="UPDATE `profile` SET
`first_name` = '$fname',
`last_name` = '$lname',
`bio` = '$bio',
`date` = '$dob',
`facebook` = '$facebook',
`insta` = '$insta',
`linkedin` = '$web'
WHERE `id` = '$username->id';";
    if($conn->query($sql)){
        header('location:profile.php');
    }else{
        header('location:profile-edit.php?i=1');
    }
}
get_file('__header');
?>
    <div class="body">
        <center>
            <form action="profile-edit.php" method="post" class="sign">
                <table>
                <?php 
                if(isset($_GET['i'])){
                    ?>
                    <tr>
                        <td style="color: red;"><?php echo "please try again..."?>
                    </td>
                    </tr>
                    <?php
                }
                ?>
                    <tr>
                        <td>
                            <h2 style="text-align: center;margin-bottom:20px">Update</h2>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" name="fname" placeholder="Firstname" value="<?= $username->getfirst_name();?>" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="lname" placeholder="Lastname" value="<?= $username->getlast_name();?>" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="bio" placeholder="Bio" value="<?= $username->getbio();?>" required></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="dob" placeholder="Date of birth" value="<?= $username->getdate();?>" required></td>
                    </tr>
                    <tr>
                        <td>LINKS :</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="linkedin" placeholder="Website" value="<?= $username->getlinkedin();?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="insta" placeholder="Instagram" value="<?= $username->getinsta();?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="facebook" placeholder="Facebook" value="<?= $username->getfacebook();?>"></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td><button name="submit" class="submit">Update</button></td>
                    </tr>
                </table>
            </form>
        </center>
    </div>

<?php
get_file('__footer');