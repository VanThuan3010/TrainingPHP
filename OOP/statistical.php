<?php
$sortBy = '';
$page = 'pageSatis=1';
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                <span class="d-flex gap-2">
                    Name
                    <span class="d-flex flex-column">
                        <a href="?<?php $sortBy = 'name=desc';
                                    echo $sortBy . '&' . $page ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                            </svg>
                        </a>
                        <a href="?<?php $sortBy = 'name=asc';
                                    echo $sortBy . '&' . $page ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </a>
                    </span>
                </span>
            </th>
            <th>
                <span class="d-flex gap-2">
                    Salary
                    <span class="d-flex flex-column">
                        <a href="?<?php $sortBy = 'salary=desc';
                                    echo $sortBy . '&' . $page ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                            </svg>
                        </a>
                        <a href="?<?php $sortBy = 'salary=asc';
                                    echo $sortBy . '&' . $page ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </a>
                    </span>
                </span>
            </th>
            <th>
                <span class="d-flex gap-2">
                    Hours
                    <span class="d-flex flex-column">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
                    </span>
                </span>
            </th>
        </tr>
    </thead>
    <?php
    include_once('statisOper.php');
    $total_results = mysqli_num_rows($statis->select2('employee', "Name,(BaseSalary + (SELECT hours from work WHERE employee.ID = work.ID ) * 50000 * (SELECT Coefficient FROM salary WHERE lvl IN ((SELECT lvl FROM developer WHERE developer.id = employee.ID) UNION (SELECT lvl FROM manager WHERE manager.id = employee.ID)))) AS 'salary', (SELECT `hours` FROM `work` WHERE work.ID = employee.ID) AS 'hour'"));
    
    for ($i = 1; $i <= ceil($total_results / 2); $i++) { ?>
        <a href="?<?php $page = "pageSatis=$i";
                    if (!isset($_GET['name']) && !isset($_GET['salary'])) {
                        $sortBy = '';
                        echo $page;
                    } elseif (isset($_GET['name'])) {
                        $typeSort = $_GET['name'];
                        $sortBy = "name=$typeSort";
                        echo $sortBy . '&' . $page;
                    } elseif (isset($_GET['salary'])) {
                        $typeSort = $_GET['salary'];
                        $sortBy = "salary=$typeSort";
                        echo $sortBy . '&' . $page;
                    } ?>"><input type='button' value="<?= $i ?>"></a>
    <?php }
    ?>