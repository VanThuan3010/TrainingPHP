<?php
include_once('layout.php')
?>

<body>
    <!-- modal -->
    <div class="modal fade" id="modalAddEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="insert.php" method="post">
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-text">ID Employee:</span>
                            <input type="number" name="id" id="id" class="form-control">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-text">Employee's Name:</span>
                            <input type="text" name="name" id="name" class="form-control">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-text">Employee's Age:</span>
                            <input type="number" name="age" id="age" class="form-control">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-text">Employee's Address:</span>
                            <input type="text" name="address" id="address" class="form-control">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-text">Employee's Date of Birth (yy/mm/dd):</span>
                            <input type="text" name="dob" id="dob" class="form-control">
                        </div><br>

                        <p>Choose type of Employee:</p>
                        <div class="input-group mb-3">
                            <select class="form-select" id="typeOfEm" name="typeOfEm" aria-label="Default select example">
                                <option disabled selected> -- Choose Type -- </option>
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
                            <input type="number" name="experience" id="experience" class="form-control">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-text">Employee's Base Salary:</span>
                            <input type="number" name="base_salary" id="base_salary" class="form-control">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-text">Work's hour of Employee:</span>
                            <input type="number" name="hours" id="hours" class="form-control">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-text">Month:</span>
                            <input type="text" name="month" id="month" class="form-control">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-text">Year:</span>
                            <input type="text" name="year" id="year" class="form-control">
                        </div><br>
                        <div>
                            <button name="sbm" id="sbm" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

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