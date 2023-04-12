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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "qlns";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        exit();
    }
    ?>

    <div class="container mt-3">
        <h2>Human Resource Management</h2>
        <br>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddEmployee">Add</button>
        <br><br>


    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#dev">Developer</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#manager">Manager</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#statistical">Statistical</a>
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
                    $sql = "SELECT *,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * 50000 * (SELECT Coefficient FROM salary WHERE lvl = (SELECT lvl FROM developer WHERE developer.id = employee.ID))) AS 'salary' FROM `employee` WHERE  ID IN (SELECT ID FROM developer)";
                    $result = $conn->query($sql);
                    $btnAdd = '<button type="button" class="btn btn-outline-primary">Edit</button>';
                    $btnDel = '<button type="button" class="btn btn-outline-danger">Delete</button>';
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $Salary = floor($row['salary']);
                            echo "<tr>" . "<td>". $row["Name"]. "</td>" . "<td>" .$row["DateOfBirth"]. "</td>" ."<td>". $row["Address"]. "</td>"."<td>" .$row["Experience"]."</td>"."<td>" .$Salary."</td>"."<td>". $btnAdd . $btnDel."</td>". "</tr>";
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
                    $sql = "SELECT *,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * (30000+ 50000 * (SELECT Coefficient FROM salary WHERE lvl = (SELECT lvl FROM manager WHERE manager.id = employee.ID)))) AS 'Salary' FROM `employee` WHERE  ID IN (SELECT ID FROM manager)";
                    $result = $conn->query($sql);
                    $btnAdd = '<button type="button" class="btn btn-outline-primary">Edit</button>';
                    $btnDel = '<button type="button" class="btn btn-outline-danger" }>Delete</button>';
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>" . "<td>". $row["Name"]. "</td>" . "<td>" .$row["DateOfBirth"]. "</td>" ."<td>". $row["Address"]. "</td>"."<td>" .$row["Experience"]."</td>"."<td>" .$row["Salary"]."</td>"."<td>". $btnAdd . $btnDel."</td>". "</tr>";
                        }
                    } else {
                    echo "0 results";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!-- modal -->
    <div class="modal fade" id="modalAddEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <div id="statistical" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>
</body>
</html>
 