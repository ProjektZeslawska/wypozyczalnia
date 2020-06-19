<?php
require_once("include/header.php");

$preview = new PreviewProvider($con, $loggedIn);
echo $preview->createPreviewVideo(null);

$containers = new CategoryContainers($con, $loggedIn);
echo $containers->showAllCategories();




