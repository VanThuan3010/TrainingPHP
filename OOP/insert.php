<?php 
    include_once 'database.php';
    class insertEm extends database{
        public function __construct(){
        if (isset($_POST['sbm'])) {
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

            if ($typeOfEm == 'Developer') {
                $lc = $_POST['language'];
                $lang = '';
                foreach ($lc as $x) {
                    $lang .= " " . $x;
                }
            }


            $a = new insertEm();
            if (mysqli_num_rows($a->checkid('employee', $id)) == 0) {
                $a->insert('employee', ['ID' => $id, 'Name' => $name, 'Age' => $age, 'Address' => $address, 'DateOfBirth' => $dob, 'Experience' => $exp, 'BaseSalary' => $baseSalary]);
                $a->insert('work', ['ID' => $id, 'hours' => $hours, 'month' => $month, 'years' => $year]);
                if ($typeOfEm == 'Developer') {
                    $a->insert('developer', ['ID' => $id, 'LanguageCode' => $lang, 'lvl' => $lvl]);
                } else $a->insert('manager', ['ID' => $id, 'lvl' => $lvl]);
                echo '<script> alert("Your information of employee is added!!"); </script>';
            } else echo '<script> alert("Your employee you type is exist!!"); </script>';
            header("Location: home-page.php");
        }
        }
    }
    new insertEm();
?>
