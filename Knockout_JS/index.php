<?php
    include_once 'models/connection.php';
    include_once "public/oop/nhanvien.php";
    include_once 'controllers/controller_act.php';
    $controller = "";
    $controller = isset($_GET["controller"]) ? "controller/controller_" . $_GET["controller"] . ".php" : null;
    include_once "views/main.php";
?>
