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
$k = $_POST['questionNumber'];
$srNo = $array[$k];
/*$marks = $_POST['Marks'];
$courseOutcome = $_POST['CO'];
$newQuestion = $_POST['question'];
$newOption1 = $_POST['option1'];
$newOption2 = $_POST['option2'];
$newOption3 = $_POST['option3'];
$newOption4 = $_POST['option4'];
$newAnswer = $_POST['f_answer'];*/
//*$_SESSION["array"] = $NewArray;*/
/*$srNo = $NewArray[$srNon];*/
$sqll = "SELECT * FROM question_set where sr_no = '".$srNo."' AND teacherId ='".$teacherID."' AND subjectName = '".$subjectNameOnViewQuestion."' " ;
//$sql = "SELECT * FROM question_set";
$resultt = mysqli_query($conn, $sqll);

if (mysqli_num_rows($resultt) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultt)) {
     
     $Question=$row['question'];
     $Option1=$row['option1'];
     $Option2=$row['option2'];
     $Option3=$row['option3'];
     $Option4=$row['option4']; 
} 
}
else 
{
    echo "0 results ....";
}

echo "$Question";

?>

<form action = "updateQuestion.php" method = "post">
         Question Number: 
            <input type = "text" name = "questionNo" value="<?php echo $k; ?>" required>
<br><br>
              <label>Question</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Question"  name="question" value="<?php echo $Question; ?>" />
        
              <label>Option-1</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Options A" name="option1" value="<?php echo $Option1; ?>">
        
              <label>Option-2</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Options B" name="option2" value="<?php echo $Option2; ?>">
        
              <label>Option-3</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Options C" name="option3" value="<?php echo $Option3; ?>">
        
              <label>Option-4</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Options D" name="option4" value="<?php echo $Option4; ?>">

         <input type = "submit" value ="Submit" />
      </form>

</body>
</html>  

<?php }
else{
    echo "<h1>cannot access this page directly</h1>";

}?>