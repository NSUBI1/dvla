<?php

//    session_destroy();

ob_start();


session_status() === PHP_SESSION_ACTIVE ?: session_start();
// session_destroy();
global $con;
defined("DS")? null:define("DS",DIRECTORY_SEPARATOR);
defined("DB_HOST")? null:define("DB_HOST","localhost");
defined("DB_USER")? null:define("DB_USER","root");
defined("DB_PASS")? null:define("DB_PASS","");
defined("DB_NAME")? null:define("DB_NAME","dvla_db");
$con= mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

require("function.php");
?>