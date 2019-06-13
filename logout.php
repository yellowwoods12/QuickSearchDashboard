<?php
session_start();
include_once("config.php");
if(isset($_SESSION["loggedin"])){
    $_SESSION["loggedin"]=false;
	unset($_SESSION["username"]);
	unset($_SESSION["loggedin"]);
	session_destroy();
}
header("Location: index.php");
?>