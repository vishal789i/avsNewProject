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

$k = $_POST['questionNumber'];
$srNo = $array[$k];

if($i>$k){

$sql = "DELETE FROM question_set WHERE sr_no = '".$srNo."' AND teacherId = '".$teacherID."' AND subjectName = '".$subjectNameOnViewQuestion."' ";


if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header('location: viewQuestions.php');
    
} else {
    echo "Error deleting record: " . mysqli_error($conn);
    header('location: logout.php');
}
}
else
{
  header('location: viewQuestions.php');
}





?>
</body>
</html>  

<?php }
else{
    echo "<h1>cannot access this page directly</h1>";

}?> 