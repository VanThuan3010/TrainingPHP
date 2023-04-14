<?php
include_once('connection.php');
$sql = "SELECT *,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * (30000+ 50000 * (SELECT Coefficient FROM salary WHERE lvl = (SELECT lvl FROM manager WHERE manager.id = employee.ID)))) AS 'Salary' FROM `employee` WHERE  ID IN (SELECT ID FROM manager)";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <tr>
            <td><?= $row["Name"] ?></td>
            <td><?= $row["DateOfBirth"] ?></td>
            <td><?= $row["Address"] ?></td>
            <td><?= $row["Experience"] ?></td>
            <td><?= $Salary ?></td>
            <td>
                <a href="viewEmployee.php?id=<?= $row["ID"] ?>"><button type="button" class="btn btn-primary">View</button></a>
                <a href="editEmployee.php?id=<?= $row["ID"] ?>"><button type="button" class="btn btn-success">Edit</button></a>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
        </tr>
<?php
    }
} else {
    echo "0 results";
}
?>