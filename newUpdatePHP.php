<?php session_start();?>
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
$i = 1;
$subjectNameOnViewQuestion = $_SESSION['SubjectGV'];
$teacherID = $_SESSION['adminName'];
$sql = "SELECT * FROM question_set where teacherId = '".$teacherID."' AND subjectName = '".$subjectNameOnViewQuestion."' " ;
//$sql = "SELECT * FROM question_set";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     
     $array[$i] = $row['sr_no']; 
     $i = $i +1;   
} 
}
else 
{
    echo "0 results";
}

//$subjectNameOnViewQuestion = $_SESSION['SubjectGV'];
//$teacherID = $_SESSION['adminName'];

//$i = $_POST['questionNo'];
//$srNo = $_POST['questionNo'];
$k = $_POST['questionNo'];
$srNo = $array[$k];
$marks = $_POST['Marks'];
$courseOutcome = $_POST['CO'];
$newQuestion = $_POST['question'];
$newOption1 = $_POST['option1'];
$newOption2 = $_POST['option2'];
$newOption3 = $_POST['option3'];
$newOption4 = $_POST['option4'];
$newAnswer = $_POST['f_answer'];
//*$_SESSION["array"] = $NewArray;*/
/*$srNo = $NewArray[$srNon];*/
$sqll = "UPDATE question_set SET question='$newQuestion', option1='$newOption1', option2='$newOption2', option3='$newOption3', option4='$newOption4', f_answer='$newAnswer', M = '$marks', CO = '$courseOutcome' WHERE sr_no = '".$srNo."' AND teacherId = '".$teacherID."' AND subjectName = '".$subjectNameOnViewQuestion."' ";

if (mysqli_query($conn, $sqll)) {
    echo "Record updated successfully";
    header('location: viewQuestions.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
    header('location: logout.php');
}



?>
</body>
</html>  

<?php }
else{
    echo "<h1>cannot access this page directly</h1>";

}?>