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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="styles/mystyles.css">
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
	<div class="topnav">
   
        <a href="adminhome.html" target="_parent">HOME</a>
        <a href="adminprofile.php" target="_parent">PROFILE</a>
        <a href="viewcomplaint.html" target="_parent">COMPLAINTS</a>
        <a href="resolved.php" target="_parent">SOLVED COMPLAINTS</a>
        <a href="logout.php" target="_parent">LOGOUT</a>
    </div>
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
$temp=$_SESSION['id'];
$query=mysqli_query($con,"select * from complaint where complaint.hid='$temp' and status='resolved'");
while($row=mysqli_fetch_array($query))
{
?>										
										<tr>
											<td><?php echo htmlentities($row['cid']);?></td>
											<td><?php echo htmlentities($row['cdate']);?></td>
											<td><?php echo htmlentities($row['title']);?></td>
											<td><a href="resolveddetails.php?cid=<?php echo htmlentities($row['cid']);?>"> View Details</a> 
											</td>
											</tr>

										<?php  } ?>
										</tbody>
								</table>
</body>
</html>					