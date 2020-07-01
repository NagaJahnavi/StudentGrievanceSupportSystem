<?php
session_start( );
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
   header("Location:studentlogin.html");
} 
 $con=mysqli_connect('127.0.0.1','root','');
    if(!$con){
        echo 'Not Connected To Server';
    }
    if(!mysqli_select_db($con,'info')){
        echo 'Database Not Selected';
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="styles/mystyles.css">
        <style>
            b{
                color:white;
            }
        </style>
</head>
<body>
    <head>
        <script language="javascript" type="text/javascript">
              window.history.forward( );
        </script>
    </head>
    <div class="topnav">
   
        <a href="adminhome.html" target="_parent">HOME</a>
        <a href="adminprofile.php" target="_parent">PROFILE</a>
        <a href="viewcomplaint.html" target="_parent">COMPLAINTS</a>
        <a href="resolved.php" target="_parent">SOLVED COMPLAINTS</a>
        <a href="logout.php" target="_parent">LOGOUT</a>
    </div>
<?php 
$query=mysqli_query($con,"select * from complaint where complaint.cid =". $_GET['cid']);
while($row=mysqli_fetch_array($query))
{
?>
    <div style="margin-top:50px;margin-left:200px;background-color:purple;width:700px;height:1000px;padding:50px;color:yellow">
    <h1 style="text-align:center;padding-bottom:30px;color:yellow">COMPLAINT DETAILS</h1>
    ID:            <b><?php echo htmlentities($row['cid']); ?></b><br><br>
    DATE:          <b><?php echo htmlentities($row['cdate']); ?></b><br><br>
    CATEGORY:      <b><?php echo htmlentities($row['category']); ?></b><br><br>
    TILTE:         <b><?php echo htmlentities($row['title']); ?></b><br><br>
    DESCRIPTION:  <br>
    <b><?php echo htmlentities($row['description']); ?></b><br><br><br><br>
    STATUS:        <b><?php echo htmlentities($row['status']); ?></b><br><br>
    ACTION:<br>
    <form action="update.php" method="POST">
     <textarea name="action" rows="10" cols="70" ></textarea>
     <br><br>
     <input type="hidden" name="cid" value=<?php echo $_GET['cid'] ?>>
     <input type="hidden" name="cat" value=<?php echo $_GET['cat'] ?>>
     <input type="submit" value="update">
    </form>
</div>
<?php } ?>
</body>
</html>					
                                        