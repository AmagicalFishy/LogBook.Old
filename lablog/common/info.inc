<?php

// Start SQL session
session_start();
date_default_timezone_set("America/New_York");
$dbinfo = "mysql: host=localhost;dbname=logbook";
$username = "logbook";
$password = "pocarlab";

// If the logbook password isn't set, redirect to password screen
if ($_SESSION["password"] != "password"){
	header("Location: /pocarlab/common/login.php");

echo "<link rel='icon' type='image/ico' href='/pocarlab/favicon.ico'>";
}

//Allows proper back-button function
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: post-check=0, pre-check=0",false);
session_cache_limiter("must-revalidate");
?>
