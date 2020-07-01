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
  <link rel="stylesheet" type="text/css" href="styles/profilesty.css">
  <style>
    #comp {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top:50px;
}

#comp td, #comp th {
  border: 1px solid #ddd;
  padding: 8px;
}

#comp tr:nth-child(even){background-color: lightgreen;}
#comp tr:nth-child(odd){background-color: lightgreen;}

#comp tr:hover {background-color: #ddd;}

#comp th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: purple;
  color: white;
}
    </style>
</head>
<body>
<ul>
        <li><a href="profilep.php">MY PROFILE</a></li>
        <li><a href="scomplaint.html">FILE COMPLAINT</a></li>
        <li><a class="active" href="stucomplaintview.html">VIEW COMPLAINT HISTORY</a></li>
        <li style="float: right;"><a href="logout.php">LOGOUT</a></li>
    </ul>
                <table id="comp">
                  <thead>
                    <tr>
                      <th>cid</th>
                      <th>cdate</th>
                      <th>title</th>
                      <th>details</th>
                    </tr>
                  </thead>
                
<tbody>
<?php 
$temp=$_SESSION['rollno'];
$t1=$_POST['cat'];
$query1=mysqli_query($con,"select * from complaint where complaint.rollno='$temp' and status='unresolved'");
$query2=mysqli_query($con,"select * from complaint where complaint.rollno='$temp' and complaint.category='$t1' and status='unresolved'");
$query=$query2;
if($t1=="All")
  $query=$query1;
while($row=mysqli_fetch_array($query))
{
?>                    
                    <tr>
                      <td><?php echo htmlentities($row['cid']);?></td>
                      <td><?php echo htmlentities($row['cdate']);?></td>
                      <td><?php echo htmlentities($row['title']);?></td>
                      <td><a href="complaintd.php?cid=<?php echo htmlentities($row['cid']);?>&cat=<?php echo $t1;?>"> View Details</a> 
                      </td>
                      </tr>

                    <?php  } ?>
                    </tbody>
                </table>
</body>
</html>
         