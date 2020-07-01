<?php
session_start();
$con=mysqli_connect('127.0.0.1','root','');
if(!$con){
    echo "NOT CONNECTED TO SERVER";
}
if(!mysqli_select_db($con,'info')){
    echo "Database not found";
}
$name=$_POST['stuname'];
$roll=$_POST['sturoll'];
$br=$_POST['stubranch'];
$yr=$_POST['year'];
$col=$_POST['clg'];
$u=$_POST['unv'];
$e=$_POST['email'];
$pass1=$_POST['pass'];
$pass2=$_POST['repass'];
$fname=$_FILES['uploadpic']["name"];
 $temp=$_FILES['uploadpic']["tmp_name"];
 $folder="profilepics/".$fname;
 move_uploaded_file($temp,$folder);

if ($pass1 != $pass2) {
    //echo ("Error... Passwords do not match");
    //header('location:registration.html');
    echo("<script>alert('Passwords do not match!')</script>");
    echo("<script>window.location = 'sregister.html';</script>");
}
else{
$sql="SELECT * from register where name='$name' and rollnumber='$roll' and password='$pass1'";
$ans=mysqli_query($con,$sql);
$res = mysqli_num_rows($ans);  
if($res==1){
    //echo "Data already exists in the student database";
    //header('refresh:1;url:login.html');
    echo("<script>alert('Data already exists in the database!!')</script>");
    echo("<script>window.location = 'studentlogin.html';</script>");
}
else{
    $query="INSERT INTO register(name,rollnumber,branch,year,college,university,email,password,picsource) VALUES
    ('$name','$roll','$br','$yr','$col','$u','$e','$pass1','$folder')";

    mysqli_query($con,$query);
    echo("<script>alert('Registered successfully!!:)')</script>");
    echo("<script>window.location='studentlogin.html';</script>");
    //if(!mysqli_query($con,$query)){
        //echo "Regitration was unsuccessful.Please!Register again.";
        //header('refresh:2;url:registration.html');
      //  echo("<script>alert('Regitration was unsuccessful.Please!Register again.')</script>");
        //echo("<script>window.location = 'registartion.html';</script>");
    //}
    
}
}
?>