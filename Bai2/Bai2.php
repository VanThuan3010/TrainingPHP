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
                  include_once ('listDev.php');
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
                  include_once ('listManager.php');
                ?>
            </tbody>
        </table>
    </div>
    
    <div id="statistical" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>
</body>
</html>
 