<?php
include_once 'layout.php';
include_once 'database.php';
$b = new database();
$b->select("employee", "*,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * 50000 * (SELECT Coefficient FROM salary WHERE lvl = (SELECT lvl FROM developer WHERE developer.id = employee.ID))) AS 'salary'", "ID IN (SELECT ID FROM developer)");
$result = $b->sql;
?>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row["Name"] ?></td>
        <td><?= $row["DateOfBirth"] ?></td>
        <td><?= $row["Address"] ?></td>
        <td><?= $row["Experience"] ?></td>
        <td><?= floor($row["salary"]) ?></td>
        <td>
            <a href="read.php?id=<?= $row["ID"] ?>"><button type="button" class="btn btn-primary">View</button></a>
            <a href="editForm.php?id=<?= $row["ID"] ?>"><button type="button" class="btn btn-success">Edit</button></a>
            <a href="delete.php?id=<?= $row["ID"] ?>"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
    </tr>
<?php } ?>

<body>
</body>