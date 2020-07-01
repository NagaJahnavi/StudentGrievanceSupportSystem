<?php
session_start( );
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
   header("Location:adminlogin.html");
} 
$con=mysqli_connect('127.0.0.1','root','');
if(!$con){
	echo 'Not Connected To Server';
}
if(!mysqli_select_db($con,'info')){
	echo 'Database Not Selected';
}
$status='unresolved';
$rollno=$_SESSION['rollno'];
$U=$_SESSION['university'];
$C=$_SESSION['college'];
$D=$_SESSION['branch'];
$title=$_POST['title'];
$level=$_POST['category'];
$category=$_POST['type'];
$des=$_POST['Describe'];
$hid="";
$query=mysqli_query($con,"SELECT * FROM map where rkey='$U'");
while($row=mysqli_fetch_array($query))
   $U=$row['rval'];
$query=mysqli_query($con,"SELECT * FROM map where rkey='$C'");
while($row=mysqli_fetch_array($query))
   $C=$row['rval'];
$query=mysqli_query($con,"SELECT * FROM map where rkey='$D'");
while($row=mysqli_fetch_array($query))
   $D=$row['rval'];
if($level=="UNIVERSITY")
  $hid=$hid."U".$U."000";
else if($level=="COLLEGE")
  $hid=$hid."C".$U.$C."0";
else
  $hid=$hid."D".$U.$C.$D;
echo $hid;
$sql="INSERT INTO `complaint`(`rollno`,`hid`, `category`, `title`, `description`, `status`) VALUES ('$rollno','$hid','$category','$title','$des','unresolved')";
if(!mysqli_query($con,$sql)){
	echo 'NOT SUCCESSFULLY SUBMITTED';
}
else{
    echo 'SUCCESSFULLY SUBMITTED';
	  header("refresh:5,Location:profilep.php.html");
}
?>