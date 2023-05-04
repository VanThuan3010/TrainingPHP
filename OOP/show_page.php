<?php
include_once 'database.php';
include_once 'layout.php';
$a = new database();
$total_results = mysqli_num_rows($a->select2('developer', '*'));
for ($i = 1; $i <= ceil($total_results / 2); $i++) { ?>
    <a href="?page=<?= $i ?>"><input type='button' value="<?= $i ?>"></a>
<?php } ?>