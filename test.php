<?php
// include_once "lib/load.php";

// $n= new usersession(74);
// date_default_timezone_set('asia/kolkata');
// echo date_default_timezone_get()."<br>";
// echo $n->data['time']."<br>";
// $t=strtotime($n->data['time']);
// echo $t."<br>".time();
$r=3;
try{
    if($r==1){
        echo "njan";
    }else{
        throw new Exception('r is not 1');
    }

}
catch(Exception){
    echo "matannal";

}