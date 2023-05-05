<?php 
    include_once 'database.php';
    class updateEm extends database{
        public function update($table, $para = array(), $id)
        {
            $args = array();

            foreach ($para as $key => $value) {
                $args[] = "$key = '$value'";
            }

            $sql = "UPDATE  $table SET " . implode(',', $args);

            $sql .= " WHERE $id";

            $result = $this->mysqli->query($sql);
        }
    }
    if (isset($_POST['update'])) {
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


        $a = new updateEm();
        $a->update('employee',['ID'=>$id,'Name'=>$name,'Age'=>$age,'Address'=>$address,'DateOfBirth'=>$dob,'Experience'=>$exp,'BaseSalary'=>$baseSalary], "id='$id'");
        $a->update('work',['ID'=>$id,'hours'=>$hours,'month'=>$month,'years'=>$year], "id='$id'");
        if($typeOfEm == 'Developer'){
            $a->update('developer',['ID' => $id,'LanguageCode' => $lang, 'lvl' => $lvl], "id='$id'");
        } else $a->update('manager', ['ID' => $id, 'lvl' => $lvl], "id='$id'");
        echo '<script> alert("Your information have been updated!!"); </script>';
    }
