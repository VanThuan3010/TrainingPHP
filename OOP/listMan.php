<?php
include_once ('database.php');
$listMan = new database();
$listMan->select("employee", "*,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * 50000 * (SELECT Coefficient FROM salary WHERE lvl = (SELECT lvl FROM manager WHERE manager.id = employee.ID))) AS 'salary'", "ID IN (SELECT ID FROM manager)");
$result = $listMan->sql;
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
            <form class="d-inline">
                <button type="submit" id="del" name="del" value="<?= $row["ID"] ?>" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
<?php } ?>