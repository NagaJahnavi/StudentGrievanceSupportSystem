<?php
session_start();
if(!isset($_SESSION['rollno'])){
    header('location:studentlogin.html');
}
$rollnu=$_SESSION['rollno'];
$con=mysqli_connect('127.0.0.1','root','');
if(!$con){
    echo "Not connected server";
}
if(!mysqli_select_db($con,'info')){
    echo "database not found";
}
$sql="SELECT * from register where rollnumber='$rollnu'";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
if($count!=1){
    echo "No data found";
}
?>
<!DOCTYPE html>
<html>
    <head><link link rel = "stylesheet" type = "text/css" href = "styles/pstyle.css"> </head>
    <body style="background-color: aliceblue;">
<?php
while($row=mysqli_fetch_array($res)){
echo "<div id='container'>";
echo "<b>PROFILE PICTURE</b>";
echo "<br/>";
echo "<br/>";
echo "<img src=' ".$row['picsource']." '>";
echo "<br/>";
echo "<p><b>NAME : </b>  ".$row['name']."</p>";
echo "<p><b>ROLLNUMBER : </b> ".$row['rollnumber']."</p>";
echo "<p><b>BRANCH : </b> ".$row['branch']."</p>";
echo "<p><b>YEAR : </b> ".$row['year']."</p>";
echo "<p><b>COLLEGE : </b> ".$row['college']."</p>";
echo "<p><b>UNIVERSITY : </b> ".$row['university']."</p>";
echo "<p><b>EMAIL : </b> ".$row['email']."</p>";

echo "</div>";
?>
<?php } ?>
    </body>
</html>