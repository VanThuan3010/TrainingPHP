<?php

include_once "application/controller.php";
include_once "application/model.php";
include_once "config.php";
include_once "public/oop/calculateSalary.php";
include_once "public/oop/person.php";
include_once "public/oop/developer.php";
include_once "public/oop/managerProduct.php";
include_once "public/oop/language.php";
include_once "public/oop/work.php";
$controller = "";
$controller = isset($_GET["controller"]) ? "controller/controller_" . $_GET["controller"] . ".php" : null;
include_once "view/view_layout.php";
?>