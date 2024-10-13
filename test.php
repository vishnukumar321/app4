<?php
if(isset($_POST['sub'])){
    echo "<pre>";
    print_r($_POST['check']);
    echo "</pre>";
}
?>
<form action="test.php" method="post"><?php
for($i=0;$i<5;$i++){
    ?><input type="checkbox" name="check[]" value="<?= $i?>">
    <?php
}
?>
<button name="sub">sub</button>
</form>
    