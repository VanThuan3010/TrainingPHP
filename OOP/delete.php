<?php
    include 'database.php';
    class delEm extends database{
        public function delete($table, $id)
        {
            $sql = "DELETE FROM $table WHERE $id";
            $result = $this->mysqli->query($sql);
        }   
    }
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $a = new delEm();
        $a->delete('employee', "id='$id'");
        $a->delete('work', "id='$id'");
        if (mysqli_num_rows($a->checkid('developer', $id)) > 0) {
            $a->delete('developer', "id='$id'");
        } else $a->delete('manager', "id='$id'");

    }
    header("Location: home-page.php");
?>
