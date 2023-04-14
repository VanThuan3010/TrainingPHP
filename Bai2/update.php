<?php
    include ('connection.php');
    
    if (isset($_POST['update'])){
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
        // echo $id . " " . $name . "  " . $age . " " . $address . " " . $dob . " " . $baseSalary . " " . $typeOfEm .  " "  . $lvl ." "   . $lang. " "  . $hours . " " . $month . " " . $year;
        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee WHERE ID='$id'"))){
            mysqli_query($conn, "UPDATE employee SET Name = '$name', Age = '$age', Address = '$address', DateOfBirth = '$dob', Experience = '$exp', BaseSalary = '$baseSalary'  WHERE ID = '$id'");
            mysqli_query($conn, "UPDATE work SET hours = '$hours', month = '$month', years = '$year' WHERE ID = '$id'");
            if ($typeOfEm == 'Developer'){
                $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM developer WHERE ID='$id'"));
                if($check > 0){
                mysqli_query($conn, "UPDATE developer SET LanguageCode = '$lang', Level = '$lvl' WHERE ID = '$id'");
                } else {
                    mysqli_query($conn, "DELETE FROM manager WHERE ID = '$id'");
                    mysqli_query($conn, "INSERT INTO developer VALUES ('$id', '$lang', '$lvl')");
                }
            } else{
                $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM manager WHERE ID='$id'"));
                if ($check > 0) {
                    mysqli_query($conn, "UPDATE manager SET lvl = '$lvl' WHERE ID = '$id'");
                } else {
                    mysqli_query($conn, "DELETE FROM developer WHERE ID = '$id'");
                    mysqli_query($conn, "INSERT INTO manager VALUES ('$id', '$lvl')");
                }
            }
        }else {
            echo '<script> alert("ID Not Existed"); </script>';

        }
        echo '<script> alert("Your information of employee is update!!"); </script>';
    }
    header("Location: Bai2.php");
    }
