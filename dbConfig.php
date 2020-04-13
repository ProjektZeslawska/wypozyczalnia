<?php
ob_start();
session_start();

$timezone = date_default_timezone_set("Europe/Warsaw");
$con = mysqli_connect("localhost", "root", "", "wypozyczalnia");