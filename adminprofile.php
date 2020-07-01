<?php
session_start();
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
    header("Location:adminlogin.html");
} 
?>
<html>
<head><title>ADMIN PROFILE</title>
    <link rel="stylesheet" type="text/css" href="styles/mystyles.css">
    <style>
        b{
            color:yellow;
        }
        </style>
</head>
<body>
    <h2>STUDENT GRIEVANCE SUPPORT SYSTEM</h4>
    <div class="topnav">
   
        <a href="adminhome.html" target="_parent">HOME</a>
        <a href="adminprofile.php" target="_parent">PROFILE</a>
        <a href="viewcomplaint.html" target="_parent">COMPLAINTS</a>
        <a href="resolved.php" target="_parent">SOLVED COMPLAINTS</a>
        <a href="logout.php" target="_parent">LOGOUT</a>
    </div>
     <h1 style="text-align:center">COMMITTEE PROFILE</h2>
    <div style="margin-top:50px;margin-left:200px;padding:50px;width:700px;height:200px;background-color:purple;color:white">
    <?php
    $map=array();
    $map['JN']='JNTU';$map['OU']='OU';$map['01']='CVR';$map['02']='SI';$map['03']='MGIT';$map['04']='MVSR';
    $map['A']='ECE';$map['B']='CSE';$map['C']='IT';$map['D']='EEE';$map['E']='MECH';$map['F']='CIVIL';
    $temp=$_SESSION["id"];
    $t1=substr($temp,0,1);
    $t2=substr($temp,1,2);
    if($t1=="U"){
        echo "<label>Committee Level:</label><b>    UNIVERSITY GRIEVANCE REDRESSAL COMMITTEE</b>";
        echo "<p>University Name:<b>  $map[$t2]</b></p>";
    }
    else if($t1=="C"){
        $t3=substr($temp,3,2);
        echo "Committee Level:<b>   COLLEGE GRIEVANCE REDRESSAL COMMITTEE</b>";
        echo "<p>University Name:<b>  $map[$t2]</b></p>";
        echo "<p>College Name:<b>  $map[$t3]</b></p>";
    }
    else if($t1=="D"){
        $t3=substr($temp,3,2);
        $t4=substr($temp,5,1);
        echo "Committee Level:<b>     DEPARTMENT GRIEVANCE REDRESSAL COMMITTEE</b>";
        echo "<p>University Name:<b>  $map[$t2]</b></p>";
        echo "<p>College Name:<b>  $map[$t3]</b></p>";
        echo "<p>Department Name:<b>  $map[$t4]</b></p>";
    }
    ?>
    </div>
    </body>
    </html>;