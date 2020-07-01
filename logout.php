<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['loggedin']);
session_destroy();
header("Location:home.html");
exit;
?>