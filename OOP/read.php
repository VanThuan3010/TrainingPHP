<body>
    <?php
    include_once 'layout.php';
    include 'database.php';

    $id = $_GET['id'];
    $b = new database();
    $b->select("employee", "*", "id='$id'");
    $employees = mysqli_fetch_assoc($b->sql);
    $b->select("work", "*", "id='$id'");
    $works = mysqli_fetch_assoc($b->sql);
    if (mysqli_num_rows($b->checkid('developer',$id)) > 0){
        $type =  'Developer';
        $lvl = mysqli_fetch_assoc($b->select2("developer", "*", "id='$id'"));
    } else{
        $type =  'Manager';
        $lvl = mysqli_fetch_assoc($b->select2("manager", "*", "id='$id'"));
    }
    ?>
    <div class="container">
        <a href="home-page.php"><button type="button" class="btn btn-secondary">Back</button></a>
        <h4>Edit Employee</h4>
        <form action="">
            <div class="input-group">
                <span class="input-group-text">ID Employee:</span>
                <input type="number" value="<?= $employees['ID'] ?>" name="id" id="id" readonly class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Name:</span>
                <input type="text" value="<?= $employees['Name'] ?>" name="name" readonly id="name" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Age:</span>
                <input type="number" value="<?= $employees['Age'] ?>" readonly name="age" id="age" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Address:</span>
                <input type="text" value="<?= $employees['Address'] ?>" readonly name="address" id="address" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Date of Birth (yy/mm/dd):</span>
                <input type="text" value="<?= $employees['DateOfBirth'] ?>" readonly name="dob" id="dob" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Type of Employee:</span>
                <input type="text" value="<?= $type ?>" name="dob" id="dob" readonly class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Level:</span>
                <input type="text" value="<?= $lvl['lvl'] ?>" name="dob" readonly id="dob" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Experience (By Years):</span>
                <input type="number" value="<?= $employees['Experience'] ?>" readonly name="experience" id="experience" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Employee's Base Salary:</span>
                <input type="number" value="<?= $employees['BaseSalary'] ?>" readonly name="base_salary" id="base_salary" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Work's hour of Employee:</span>
                <input type="number" value="<?= $works['hours'] ?>" name=" hours" readonly id="hours" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Month:</span>
                <input type="text" value="<?= $works['month'] ?>" name=" month" readonly id="month" class="form-control">
            </div><br>
            <div class="input-group">
                <span class="input-group-text">Year:</span>
                <input type="text" value="<?= $works['years'] ?>" name="year" readonly id="year" class="form-control">
            </div><br>
            <div>
                <button name="update" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</body>