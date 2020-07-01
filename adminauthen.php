<?php
session_start();
$con=mysqli_connect('127.0.0.1','root','');
if(!$con){
    echo "NOT CONNECTED TO SERVER";
}
if(!mysqli_select_db($con,'info')){
    echo "Database not found";
}
$admin_id=$_POST['adminid'];
$pass1=$_POST['pass'];
$sql="SELECT * from admin where aid='$admin_id' and  password='$pass1'"; 
$result = mysqli_query($con, $sql);  
$res = mysqli_num_rows($result);  
if($res==1){
    $_SESSION['id']=$admin_id;
    $_SESSION['loggedin']=true;
    header('location:adminhome.html');
}
else{
    echo "invalid";
}
?>