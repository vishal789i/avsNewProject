<?php session_start();?>
<?php if(isset($_SESSION['startedOfAdmin'])){?>

<!DOCTYPE html>
<html>
<head>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
	<style>
		#customers {
		  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		#customers td, #customers th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #f2f2f2;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: #666666;
		  color: white;
		}
	</style>
</head>
<body>
 <!-- NAVIGATION -->
    <div class="w3-top">
      <div class="w3-bar w3-deep-purple">
        <span class="branding w3-bar-item w3-mobile">PICT EXAMINATION PORTAL <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Employee Name : ".$_SESSION['empName']."&nbsp;&nbsp;&nbsp;Selected Subject : ".$_SESSION['SubjectGV']." ";?></span>
        <span class="w3-right w3-mobile">
           </span>
      </div>
    </div><br><br>

	<center><h3 class="w3-red"><b>Results</h3><center>
	
	
  <?php
	error_reporting(0);
	include_once 'DBConnection.php';
	$sql = "SELECT * FROM exam_result WHERE subject='".$_SESSION['SubjectGV']."' ";
	$result = mysqli_query($conn, $sql);

	?>
<?php $counter = 0;?>

<?php 
if (mysqli_num_rows($result) > 0) { ?>
<table id="customers">
<tr>
    	<th><center><h5>Sr No</h5></center></th>
    	<th><center><h5>UserName</h5></center></th>
    	<th><center><h5>Marks</h5></center></th>     	
</tr>

<?php
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {?>
    
    <tr>
    	<td><center><?php echo ++$counter;?></center></td>
    	<td><center><?php echo $row['username'];?></center></td>
    	<td><center><?php echo $row['marks'];?></center></td>
    </tr>
    
<?php } ?>
</table>
<?php 

} else {
    echo "No results found !";
}

mysqli_close($conn);

?>
<br><br><br><br>
<button class="w3-bar-item w3-button w3-teal" onClick = "window.print()">Print This Page</button>&nbsp;
<input class="w3-bar-item w3-button w3-red" type="button" value="Go Back.." class="homebutton" id="btnHome" onClick="document.location.href='adminSignIn.php'" />

<br><br>
</body>
</html>

<?php }
else{
    echo "<h1>cannot access this page directly</h1>";
}?>
