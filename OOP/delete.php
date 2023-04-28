<?php 
    include 'database.php';

    $id = $_GET['id'];

    $a = new database();
    $a->delete('employee',"id='$id'");
    $a->delete('work', "id='$id'");
    if (mysqli_num_rows($a->checkid('developer', $id)) > 0){
        $a->delete('developer', "id='$id'");
    } else $a->delete('manager', "id='$id'");
    header("Location: home-page.php");
?>
