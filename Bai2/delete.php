<?php
    include_once('connection.php');
    if (isset($_POST['del'])){
        $id = mysqli_real_escape_string($conn, $_POST['del']);
        mysqli_query($conn, "DELETE FROM employee WHERE ID='$id'");
        mysqli_query($conn, "DELETE FROM work WHERE ID='$id'");
        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM developer WHERE ID='$id'")) > 0){
            mysqli_query($conn, "DELETE FROM developer WHERE ID='$id'");
        } else {
            mysqli_query($conn, "DELETE FROM manager WHERE ID='$id'");
        }
    }
    header("Location: Bai2.php");
?>
