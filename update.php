<?php
session_start();
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
    $t1=$_POST['cid'];
    $t2=$_POST['action'];
    $t3=$_POST['cat'];
    $query="UPDATE complaint SET status='resolved' WHERE cid='$t1'";
    mysqli_query($con,$query);
    $sql="INSERT INTO action (cid,caction) VALUES ('$t1','$t2')";
    $temp="";
    if(!mysqli_query($con,$sql)){
        $temp="UNSUCCESSFUL";
    }
    else{
        $temp="SUCCESSFUL";
    }
    ?>
    <html>
        <head>
              <link rel="stylesheet" type="text/css" href="styles/mystyles.css">
        </head>
    <div style="background-color:purple;color:yellow;margin:auto;padding:20px;width:200px;height:200px">
        <p> <?php echo $temp; ?> <p>
    <form action="displaycomplaints.php" method="POST">
     <input type="hidden" name="cat" value=<?php echo $_POST['cat'] ?>>
     <input type="submit" value="go to complaints page">
   </form>
</div>
   </html>
 
