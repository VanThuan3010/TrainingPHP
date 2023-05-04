<?php
include_once('database.php');
class sorts extends database
{
    public $que;
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'qlns';
    private $result = array();
    private $mysqli = '';

    public function __construct()
    {
        $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
    public function sort($table, $rows, $col, $type)
    {
        $sql = "SELECT $rows FROM $table ORDER BY $col $type";
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
$statis = new sorts();
if(isset($_GET['name'])){
    $col = 'name';
    $type = $_GET['name'];
    $statis->sort("employee", "Name,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * 50000 * (SELECT Coefficient FROM salary WHERE lvl IN ((SELECT lvl FROM developer WHERE developer.id = employee.ID) UNION (SELECT lvl FROM manager WHERE manager.id = employee.ID)))) AS 'salary', (SELECT `hours` FROM `work` WHERE work.ID = employee.ID) AS 'hour'",$col,$type);
} else $statis->select("employee", "Name,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * 50000 * (SELECT Coefficient FROM salary WHERE lvl IN ((SELECT lvl FROM developer WHERE developer.id = employee.ID) UNION (SELECT lvl FROM manager WHERE manager.id = employee.ID)))) AS 'salary', (SELECT `hours` FROM `work` WHERE work.ID = employee.ID) AS 'hour'");
$result = $statis->sql;
?>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row["Name"] ?></td>
        <td><?= floor($row["salary"]) ?></td>
        <td><?= $row["hour"] ?></td>
    </tr>
<?php } ?>