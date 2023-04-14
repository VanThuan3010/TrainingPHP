<?php
    include ('connection.php');
    
    if (isset($_POST['sbm'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $baseSalary = $_POST['base_salary'];
    $typeOfEm = $_POST['typeOfEm'];
    $lvl = $_POST['level'];
    $exp = $_POST['experience'];
    $hours = $_POST['hours'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    if($id != "" && $name != "" && $age != "" && $address != "" && $dob != "" && $baseSalary != "" && $hours != "" && $month != "" && $year != ""){
        
        if ($typeOfEm == 'Developer') {
            $lc = $_POST['language'];
            $lang = '';
            foreach ($lc as $x) {
                $lang .= " " . $x;
            }
        }
        //echo $id . " " . $name . "  " . $age . " " . $address . " " . $dob . " " . $baseSalary . " " . $typeOfEm .  " "  . $lvl ." "   . $lang. " "  . $hours . " " . $month . " " . $year;
        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee WHERE ID='$id'"))){
            echo '<script> alert("ID Existed"); </script>';
        }else {
            mysqli_query($conn, "INSERT INTO employee VALUES ('$id', '$name','$age', '$address', '$dob','$exp', '$baseSalary')");
            mysqli_query($conn, "INSERT INTO work VALUES ('$id', '$hours', '$month', '$year')");
            if ($typeOfEm == 'Developer'){
                mysqli_query($conn, "INSERT INTO developer VALUES ('$id', '$lang', '$lvl')");
            } else{
                mysqli_query($conn, "INSERT INTO manager VALUES ('$id', '$lvl')");
            }
        }
        echo '<script> alert("Your information of employee is added!!"); </script>';
    }
    header("Location: Bai2.php");
    }
?>