<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <?php
    include('connection.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employee WHERE ID='$id'")) > 0) {
            $employees = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM employee WHERE ID='$id'"));
            $works = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM work WHERE ID='$id'"));
        } else {
            echo '<script> alert("ID Not Existed"); </script>';
        }
    }
    ?>
    <div class="container">
        <a href="Bai2.php"><button type="button" class="btn btn-secondary">Back</button></a>
        <h4>Edit Employee</h4>
        <form action="update.php" method="POST">
            <div class="input-group">
                <span class="input-group-text">ID Employee:</span>
                <input type="number" value="<?= $employees['ID'] ?>" name="id" id="id" readonly class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Name:</span>
                <input type="text" value="<?= $employees['Name'] ?>" name="name" id="name" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Age:</span>
                <input type="number" value="<?= $employees['Age'] ?>" name="age" id="age" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Address:</span>
                <input type="text" value="<?= $employees['Address'] ?>" name="address" id="address" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Date of Birth (yy/mm/dd):</span>
                <input type="text" value="<?= $employees['DateOfBirth'] ?>" name="dob" id="dob" class="form-control">
            </div><br>
            <p>Choose type of Employee:</p>
            <div class="input-group mb-3">
                <select class="form-select" id="typeOfEm" name="typeOfEm" aria-label="Default select example">
                    <?php
                    $typeOfEmployee = array('Developer', 'Manager');
                    foreach ($typeOfEmployee as $type) {
                        echo '<option value="' . $type . '">' . $type . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                Choose Level of Employee: <br>
                <div class="d-flex flex-wrap gap-2">
                    <input type="radio" id="junior_1" name="level" value="Junior 1">
                    <label for="junior_1">Junior 1</label><br>
                    <input type="radio" id="junior_2" name="level" value="Junior 2">
                    <label for="junior_2">Junior 2</label><br>
                    <input type="radio" id="junior_3" name="level" value="Junior 3">
                    <label for="junior_3">Junior 3</label>
                    <input type="radio" id="junior_4" name="level" value="Junior 4">
                    <label for="junior_4">Junior 4</label>
                    <input type="radio" id="junior_5" name="level" value="Junior 5">
                    <label for="junior_5">Junior 5</label>
                </div>
                <divv class="d-flex flex-wrap gap-2">
                    <input type="radio" id="pa" name="level" value="PA">
                    <label for="pa">PA</label>
                    <input type="radio" id="pm" name="level" value="PM">
                    <label for="pm">PM</label>
                </divv>
            </div>
            Check Language Code for Developer: <br>
            <div class="form-check d-flex gap-5">
                <div>
                    <input class="form-check-input" name="language[]" id="android" type="checkbox" value="Android">
                    <label class="form-check-label" for="android">Android</label>
                </div>
                <div>
                    <input class="form-check-input" name="language[]" id="php" type="checkbox" value="PHP">
                    <label class="form-check-label" for="php">PHP</label>
                </div>
                <div>
                    <input class="form-check-input" name="language[]" id="javascript" type="checkbox" value="Javascipt">
                    <label class="form-check-label" for="javascropt">Javascipt</label>
                </div>
                <div>
                    <input class="form-check-input" name="language[]" id="css" type="checkbox" value="CSS">
                    <label class="form-check-label" for="css">CSS</label>
                </div>
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Experience (By Years):</span>
                <input type="number" value="<?= $employees['Experience'] ?>" name="experience" id="experience" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Base Salary:</span>
                <input type="number" value="<?= $employees['BaseSalary'] ?>" name="base_salary" id="base_salary" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Work's hour of Employee:</span>
                <input type="number" value="<?= $works['hours'] ?>" name=" hours" id="hours" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Month:</span>
                <input type="text" value="<?= $works['month'] ?>" name=" month" id="month" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Year:</span>
                <input type="text" value="<?= $works['years'] ?>" name="year" id="year" class="form-control">
            </div><br>
            <div>
                <button name="update" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <script>
        $("#typeOfEm").change(function() {
            $("select option:selected").each(function() {
                if ($(this).val() == 'Developer') {
                    $('#pa').attr('disabled', true);
                    $('#pm').attr('disabled', true);
                    $('#junior_1').attr('disabled', false);
                    $('#junior_2').attr('disabled', false);
                    $('#junior_3').attr('disabled', false);
                    $('#junior_4').attr('disabled', false);
                    $('#junior_5').attr('disabled', false);
                    $('#php').attr('disabled', false);
                    $('#css').attr('disabled', false);
                    $('#javascript').attr('disabled', false);
                    $('#android').attr('disabled', false);
                }
                if ($(this).val() == 'Manager') {
                    $('#pa').attr('disabled', false);
                    $('#pm').attr('disabled', false);
                    $('#junior_1').attr('disabled', true);
                    $('#junior_2').attr('disabled', true);
                    $('#junior_3').attr('disabled', true);
                    $('#junior_4').attr('disabled', true);
                    $('#junior_5').attr('disabled', true);
                    $('#php').attr('disabled', true);
                    $('#css').attr('disabled', true);
                    $('#javascript').attr('disabled', true);
                    $('#android').attr('disabled', true);
                }
            });
        })
    </script>
</body>