<?php
include_once "database.php";
$conn=database::get_conn();
if(isset($_POST['del'])){
    if(isset($_POST['id'])){
        $idarr=$_POST['id'];
        foreach($idarr as $aid){
            $del_sql="DELETE FROM `signup` WHERE `id` = '$aid';";
            if($conn->query($del_sql)==1){
                header('location:njan_2.php');
            }else{
                echo "not deleted";
            }

            
        }

    }else{
        echo "not selected";

    }
}
?>
<center>
<form action="njan_2.php" method="post">
    <table border="1">
        <?php
        $sql="SELECT * FROM `signup`;";
        $result=$conn->query($sql);
        if($result->num_rows==true){
            ?>
                <tr>
                    <th>row</th>
                    <th>username</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>password</th>
                </tr>
            
                <?php
            while($row=$result->fetch_assoc()){
                $id=$row['id'];
                ?>
                <tr>
                    <td><input type="checkbox" name="id[]" value="<?= $id?>"></td>
                    <td><?= $row['username']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['phone']?></td>
                    <td><?= $row['password']?></td>
                </tr>
            
                <?php

            }
            ?>
        <tr>
            <td><button onclick="return confirm('are you sure to delete')" name="del">delete</button></td>
            <td colspan="4"></td>
        </tr><?php
        }else{
            echo "there are no rows and datas...<br>";
            
        }
        ?>
        
    </table>
    please click and insert data: <a href="../signup.php">click</a>
</form>
</center>