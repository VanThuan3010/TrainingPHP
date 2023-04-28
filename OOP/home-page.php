<?php
include_once('layout.php')
?>
<!DOCTYPE html>

<body>

    <div class="container mt-3">
        <h2>Human Resource Management</h2>
        <br>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddEmployee">Add</button>

        <br><br>
        <?php
        include('insertForm.php');
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
                        include('listDev.php') ?>
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
                        include ('listMan.php') ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>