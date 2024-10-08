<?php
include_once "lib/load.php";
get_page('head');
// get_page('header');
function get_name($name){
    $conn=database::get_conn();
    $id=$_SESSION['uid'];
    $sql="SELECT `$name` FROM `profile` WHERE `id` = '$id'";
    $result=$conn->query($sql);
    if($result->num_rows==1){
        $row=$result->fetch_assoc();
        return $row[$name];
    }
}
if (isset($_POST['sub'])) {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $bio=$_POST['bio'];
    $dob=$_POST['dob'];
    $facebook=$_POST['facebook'];
    $insta=$_POST['insta'];
    $linkedin=$_POST['linkedin'];
    $conn = database::get_conn();
    $id = $_SESSION['uid'];
    $sql = "UPDATE `profile` SET
`first_name` = '$fname',
`last_name` = '$lname',
`bio` = '$bio',
`date` = '$dob',
`facebook` = '$facebook',
`insta` = '$insta',
`linkedin` = '$linkedin'
WHERE `id` = '$id';";
if($conn->query($sql)==true){
    print_r($bio);

    header('location:profile.php');
}
}

?>
<main class="form-signin w-100 m-auto">
    <table>
        <form method="post" action="profile_edit.php">
            <img class="mb-4" src="blank-profile-picture.webp" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Profile</h1>

            <div class="form-floating">
                <input type="text" name="fname" class="form-control" id="floatingInput" placeholder="First name" value="<?= get_name('first_name')?>">
                <label for="floatingInput">First name</label>
            </div>
            <div class="form-floating">
                <input type="text" name="lname" class="form-control" id="floatingInput" placeholder="last name" value="<?= get_name('last_name')?>">
                <label for="floatingInput">last name</label>
            </div>
            <div class="form-floating">
            <input type="text" name="bio" rows="5" class="form-control" id="floatingInput" placeholder="please enter the bio..." value="<?= get_name('bio')?>">
            <label for="floatingInput">bio</label>


            <!-- <textarea rows="4" cols="50" name="bio" id="floatingInput" class="form-control" form="usrform" placeholder="Write the Bio..."><?= get_name('bio')?></textarea> -->
            
            </div>
            <div class="form-floating">
                <input type="date" name="dob" class="form-control" id="floatingInput" placeholder="date of birth" value="<?= get_name('date')?>" required>
                <label for="floatingInput">date of birth</label>
            </div>
            <div>
                <tr>
                    <td><label for="">LINKS:</label></td>
                </tr>
            </div>
            <div>
                <tr>
                    <td><label for="floatingPassword">Facebook</label></td>
                    <td><input type="text" name="facebook" class="form-control" id="floatingPassword" placeholder="Facebook" value="<?= get_name('facebook')?>"></td>
                </tr>

            </div>
            <div>
                <tr>
                    <td><label for="floatingPassword">Instagram</label></td>
                    <td><input type="text" name="insta" class="form-control" id="floatingPassword" placeholder="Instagram" value="<?= get_name('insta')?>"></td>
                </tr>
            </div>
            <div>
                <tr>
                    <td><label for="floatingPassword">linkedin</label></td>
                    <td><input type="text" name="linkedin" class="form-control" id="floatingPassword" placeholder="linkedin" value="<?= get_name('linkedin')?>"></td>
                </tr>
            </div>
            <div>
                <tr>
                    <td colspan="2"><button name="sub" style="margin-top: 20px;" class="btn btn-primary w-100 py-2" type="submit">Update</button></td>
                </tr>
            </div>
        </form>
    </table>
</main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>