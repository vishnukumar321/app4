<?php
include_once "database.php";
session_start();
echo $_SESSION['name'];
$conn=database::get_conn();
$sql="SELECT * FROM `signup`;";
$result=$conn->query($sql);
if(isset($_POST['delbutton'])){
    if(isset($_POST['id'])){
        $idarr=$_POST['id'];
        foreach($idarr as $id){
            $del_arr_sql="DELETE FROM `signup` WHERE `id` = '$id';";
            if($conn->query($del_arr_sql)===true){
                header('location:njan.php');
            }else{
                echo "not deleted";
            }
            
        }
    }else{
        echo "Not selected";
    }
}
if(isset($_GET['id'])){
    $delete=$_GET['id'];
    $del_sql="DELETE FROM `signup` WHERE `id` = '$delete';";
    if($conn->query($del_sql)===true){
        header('location:njan.php');
    }else{
        echo "not deleted";
    }

}
if($result->num_rows==true){
    ?>
    <center>
    <form action="njan.php" method="post">
    <table border="1">
    <?php
    while($row=$result->fetch_assoc()){
        ?>
        <tr>
            <?php $id=$row['id']?>
            <td>
                <input type="checkbox" name="id[]" value="<?= $id?>">
                <a href="njan.php?id=<?= $id?>" onclick="return confirm('Are you sure to delete this record?')">delete</a>
            </td>
            <td><?= $row['username']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['phone']?></td>
            <td><?= $row['password']?></td>
            <td><a href="database_values_edit.php?id=<?= $id?>">edit</a></td>
        </tr>
        
        <?php
    }
    ?>
    <tr>
            <td><button name="delbutton" onclick="return confirm('Are you sure to delete?')">delete selected</button></td>
            <td colspan="5"></td>
        </tr>
    </table>
    </form>
    <a href="database_testing.php">Go back</a>
    </center><?php
}?>
