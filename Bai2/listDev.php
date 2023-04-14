<?php
include_once('connection.php');
$sql = "SELECT *,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * 50000 * (SELECT Coefficient FROM salary WHERE lvl = (SELECT lvl FROM developer WHERE developer.id = employee.ID))) AS 'salary' FROM `employee` WHERE  ID IN (SELECT ID FROM developer)";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $Salary = floor($row['salary']);
        $id = $row['ID'];
        // echo "<tr>" . "<td>" . $row["Name"] . "</td>" . "<td>" . $row["DateOfBirth"] . "</td>" . "<td>" . $row["Address"] . "</td>" . "<td>" . $row["Experience"] . "</td>" . "<td>" . $Salary . "</td>" . "<td>";
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
                <form action="delete.php" method="post" class="d-inline">
                    <button type="submit" name="del" value="<?= $row["ID"] ?>" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
<?php
    }
} else {
    echo "0 results";
}
?>