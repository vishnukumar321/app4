<?php
include "database.php";
$conn=database::get_conn();

$q="SELECT * FROM `signup`;";
$r=$conn->query($q);
$m=$r->num_rows;
$m=$m-2;
$ks=false;

if(isset($_POST['pre'])){
    $value=$_POST['pre'];
    if($value>1){
        $value=$value-2;
    }else{
        $value=0;
        $ks="there are no data";
    }
}else if(isset($_POST['next'])){
    $value=$_POST['next'];
    if($value<$m){
        $value=$value+2;
        

    }else{
        $value=$_POST['next'];
        $ks="there are no data";
    }

    

}else{
    $value=0;
}

if(isset($_POST['button'])){
    $input=$_POST['njan'];
    $m=$m+2;
    if($input>0 && $input<=$m){
        if($input==$m){
            $input=$m-2;
        }
        $input=$input-1;
        $value=$input;
    }else{
        $ks=$input." is not founded....OK🤨<br>try again..😏";
        $value=$_POST['button'];
    }

}
$sql="SELECT * FROM `signup` limit $value, 2;";
$result=$conn->query($sql);
if($result->num_rows==true){
    ?>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .nalla{
            color: white;
            height: auto;
            padding: 10px;
            background-color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            border-radius: 30px;

        }
        .njan,td,tr,th,button,input{
            border: 1px solid black;
            margin: 2px;
            padding: 7px;
            border-radius: 30px;
            
        }
        .njan{
            background-color: white;
        }
        th,td{
            background-color: black;
            color: white;
        }
        button:hover{
            background-color: #00dcff;
            color: black;
        }
    </style>
    <center class="nalla">
    <form method="post" action="database_data_printing.php">
        
    <table class="njan">
    <tr>
        <button name="pre" value="<?php echo $value; ?>">pre</button>
        <input type="number" name="njan" placeholder="please enter id">
        <button name="button" value="<?php echo $value?>">GO</button>
        <button name="next" value="<?php echo $value; ?>">next</button>
    </tr>
        <tr>
            <th>username</th>
            <th>email</th>
            <th>phone</th>
            <th>password</th>
        </tr>
    <?php
    while($row=$result->fetch_assoc()){?>
        
        <tr>
            <td><?php echo $row['username'] ;?></td>
            <td><?php echo $row['email'] ;?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['password'] ;?></td>
        </tr>
        <?php

    }?>
    
    
    
    </table>
    <?php if($ks){
        echo $ks;
    } ?>
    </form>
    </center>
    <?php
    
    
}?><?= "njna" ?>