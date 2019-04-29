<?php session_start(); ?>
<?php if(isset($_SESSION['startedOfAdmin'])){?>

<!DOCTYPE html>
<html>
<head>
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
  background-color: #101B2D;
  color: white;
}
</style>
</head>
<body>

<?php
	include_once 'DBConnection.php';
	
	$srNo = $_POST['question_no'];
	$newQuestion = $_POST['question'];
	$newOption1 = $_POST['option1'];
	$newOption2 = $_POST['option2'];
	$newOption3 = $_POST['option3'];
	$newOption4 = $_POST['option4'];
	$newAnswer = $_POST['f_answer'];

	$sql = "UPDATE question_set SET question='$newQuestion', option1='$newOption1', option2='$newOption2', option3='$newOption3', option4='$newOption4', f_answer='$newAnswer' WHERE sr_no = $srNo";

	if (mysqli_query($conn, $sql)) {
		echo "Record updated successfully";
		header('Refresh: 2; URL = viewQuestions.php');
	} 
	else{
		echo "Error updating record: " . mysqli_error($conn);
	}
?>

</body>
</html>  

<?php }
else{
    echo "<h1>Access Forbidden.</h1>";
}?>