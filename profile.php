<?php
session_start();
if(!isset($_SESSION['studentname'])){
    header('location:studentlogin.html');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link link rel = "stylesheet" type = "text/css" href = "styles/profilesty.css"> 
    </head>
<body style="background-color: aliceblue;">
    <h2 style="text-align: center;">WELCOME <? php echo $_SESSION['studentname']?></h2>
    <ul>
        <li><a class ="active" href="profilep.php">MY PROFILE</a></li>
        <li><a href="scomplaint.html">FILE COMPLAINT</a></li>
        <li><a href="stucomplaintview.html">VIEW COMPLAINT HISTORY</a></li>
        <li style="float: right;"><a href="slogout.php">LOGOUT</a></li>
    </ul>
    
</body>
</html>