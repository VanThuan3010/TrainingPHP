<!DOCTYPE html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Human Resource Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php
  include('connection.php');
  ?>

  <div class="container mt-3">
    <h2>Human Resource Management</h2>
    <br>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddEmployee">Add</button>

    <br><br>
    <?php
    include('addEmployee.php');
    ?>

    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#dev">Developer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#manager">Manager</a>
      </li>
    </ul>

    <div class="tab-content">
      <div id="dev" class="container tab-pane active"><br>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Date of Birth</th>
              <th>Address</th>
              <th>Experience (By Year)</th>
              <th>Salary This Month</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
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
          </tbody>
        </table>
      </div>
      <div id="manager" class="container tab-pane fade"><br>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Date of Birth</th>
              <th>Address</th>
              <th>Experience (By Year)</th>
              <th>Salary This Month</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            include_once('listManager.php');
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <?php
        $num_per_page = 2;
        $total_results = mysqli_num_rows(mysqli_query($conn, " SELECT *,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * 50000 * (SELECT Coefficient FROM salary WHERE lvl = (SELECT lvl FROM developer WHERE developer.id = employee.ID))) AS 'salary' FROM `employee` WHERE  ID IN (SELECT ID FROM developer)"));
        $total_page = ceil($total_results / $num_per_page);
        for ($index = 1; $index <= $total_page; $index++) {
          echo '<li class="page-item"><a class="page-link" href="Bai2.php?page=' . $index . '">' . $index . '</a></li>';
        }
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $start_from = ($page - 1) * $num_per_page;
        mysqli_query($conn, " SELECT *,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * 50000 * (SELECT Coefficient FROM salary WHERE lvl = (SELECT lvl FROM developer WHERE developer.id = employee.ID))) AS 'salary' FROM `employee` WHERE  ID IN (SELECT ID FROM developer) LIMIT $start_from,$num_per_page");
        ?>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
  </div>
</body>

</html>