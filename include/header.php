<?php
require_once("include/dbConfig.php");
require_once("include/classes/PreviewProvider.php");
require_once("include/classes/CategoryContainers.php");
require_once("include/classes/Entity.php");

if (!isset($_SESSION['LoggedIn'])){
    header("Location: register.php");
}

$loggedIn = $_SESSION['LoggedIn'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to netflix</title>
    <link rel="stylesheet" type="text/css" href="assets/style/mainStyle.css"/>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/06a651c8da.js" crossorigin="anonymous"></script>
    <script src="assets/js/previewScript.js"></script>
</head>
<body>
<div class="wrapper">





