<?php
session_start();
$con=mysqli_connect('127.0.0.1','root','');
if(!$con){
    echo "NOT CONNECTED TO SERVER";
}
if(!mysqli_select_db($con,'info')){
    echo "Database not found";
}
$name=$_POST['user'];
$roll=$_POST['roll'];
$pass1=$_POST['pass'];
$sql="SELECT * from register where name='$name' and rollnumber='$roll' and password='$pass1'"; 
$result = mysqli_query($con, $sql);  
$res = mysqli_num_rows($result);  
if($res==1){
    $_SESSION['rollno']=$roll;
    $_SESSION['loggedin']=true;
    while($row=mysqli_fetch_array($result))
    {
        $_SESSION['university']= $row['university'];
        $_SESSION['college']=$row['college'];
        $_SESSION['branch']=$row['branch'];
    }
        $_SESSION['studentname']=$name;
    header('location:profile.php');
}
else{
    header('location:sregister.html');

}
?>