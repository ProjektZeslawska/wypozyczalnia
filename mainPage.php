<?php
include("dbConfig.php");

if (isset($_SESSION['LoggedIn'])) {
    $loggedIn = $_SESSION['LoggedIn'];
} else {
    header("Location: register.php");
}
?>
<html>
<head>
    <title>Strona główna</title>
</head>
<body>
<h2>LOGOWANIE DZIAŁA</h2>
</body>
</html>


