<?php
session_start();

include "config/batasan.php";

$_SESSION = [];

session_unset();
session_destroy();

header("Location: login.php");

?>