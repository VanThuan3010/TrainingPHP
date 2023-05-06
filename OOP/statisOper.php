<?php
include_once('database.php');
class sorts extends database
{
    public function all($table, $rows, $from, $col = null, $type = null)
    {
        if ($col == null && $type == null) $sql = "SELECT $rows FROM $table LIMIT $from,2";
        else $sql = "SELECT $rows FROM $table ORDER BY $col $type LIMIT $from,2";
        $this->sql = $result = $this->mysqli->query($sql);
    }
}
$statis = new sorts();
$sql1 = "Name,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * 50000 * (SELECT Coefficient FROM salary WHERE lvl IN ((SELECT lvl FROM developer WHERE developer.id = employee.ID) UNION (SELECT lvl FROM manager WHERE manager.id = employee.ID)))) AS 'salary', (SELECT `hours` FROM `work` WHERE work.ID = employee.ID) AS 'hour'";
if (isset($_GET['pageSatis'])) {
    $page = $_GET['pageSatis'];
    $from = ($page - 1) * 2;
} else {
    $page = 1;
    $from = 0;
}
if (isset($_GET['name'])) {
    $col = 'name';
    $type = $_GET['name'];
    $statis->all("employee",$sql1 , $from, $col, $type);
} elseif (isset($_GET['salary'])) {
    $col = 'salary';
    $type = $_GET['salary'];
    $statis->all("employee", $sql1, $from , $col, $type);
} else $statis->all("employee", $sql1, $from);
$result = $statis->sql;
?>
<tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row["Name"] ?></td>
            <td><?= floor($row["salary"]) ?></td>
            <td><?= $row["hour"] ?></td>
        </tr>
    <?php } ?>
</tbody>

</table>