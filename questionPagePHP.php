<!DOCTYPE html>	
<html>
  <head>
    <meta charset="utf-8">
    <title>PICT EXAMINATION PORTAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
<style>
body 
{
font-family: Arial, Helvetica, sans-serif;
}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] 
{
  width: 25%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 100px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}


.element::-webkit-input-placeholder {
    color: blue;
    font-weight: bold;
}	
</style>

<script>
window.location.hash="no-back-button";	//for backButton
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script> 

<?php session_start();?>
<?php if(isset($_SESSION['startedOfStudent']) ){?>

<?php include_once 'DBConnection.php'; ?>
<?php     
	$maxQuestions = $_SESSION['maxQuestions'];
	$oneMarks = $_SESSION['oneMarks'];
	$twoMarks = $_SESSION['twoMarks'];
	$length = $_SESSION['globalLength'];
	
    $userSelectedOptionsArray = array();

    for ($i = 1; $i <= $length; $i++) {   
        if (isset($_POST["question".$i."SelectedOption"])) {
            $userSelectedOptionsArray[$i] = $_POST["question".$i."SelectedOption"];
        }
        else{
            $userSelectedOptionsArray[$i] = " no option selected ";    
        }
    }
    $actualAnswer = 0;
    $counter = 0;
	$totalQuestions = 0;
	$wrongAttemps = 0;
	for ($i = 1; $i <= $length; $i++) {
		$sqlAnswerMarks = "SELECT f_answer, m FROM question_set WHERE sr_no = '".$_POST["sr_no".$i]."' ";
        $fetchedAnswerMarks = mysqli_query($conn, $sqlAnswerMarks);
		while($row = mysqli_fetch_assoc($fetchedAnswerMarks)) {
            $actualAnswer = $row['f_answer'];
			$marks = $row['m'];
			$totalQuestions++;
        }
		if($userSelectedOptionsArray[$i] == $actualAnswer){
			if($marks == 1){
				$counter++;
			}
			else if($marks == 2){
				$counter = $counter + 2;
			}
		}
		else{
			$wrongAttemps++;
		}
	}
	
   /* for ($i = 1; $i <= $minQuestions; $i++) {
        $sqlAnswer = "SELECT f_answer FROM question_set WHERE sr_no = '".$_POST["sr_no".$i]."' ";
        $fetchedAnswer = mysqli_query($conn, $sqlAnswer);
        
        while($row = mysqli_fetch_assoc($fetchedAnswer)) {
            $actualAnswer = $row['f_answer'];    
        }
       
        if($userSelectedOptionsArray[$i] == $actualAnswer){
            $counter++;        
        }
        elseif($userSelectedOptionsArray[$i] == 0){
            $counter = $counter;
        }
        
    }*/
?>




<body>
    <div class="container w3-grey">
	  <h2 class="w3-black"><center>PICT ONLINE EXAMINATION PORTAL</center></h2>
	  <h4><b><center>Subject: <?php echo $_SESSION['subject']; ?></center></b></h4>
	  
	  <hr>
      <h2><b>RESULT</b></h2>
      <p>Please generate pdf of your result and do rate your experience with us !</p>
      <hr>
	  <label for="id"><b>Login ID:&nbsp;</b></label>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $_SESSION['studentName']?>" name="email" readonly>
	  
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="psw-repeat"><b> Time Taken: </b></label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo (time()-$_SESSION['timerSetByQuestionPaper'])/60 ?> minutes" name="psw-repeat" readonly><br> 
      <br>
	  <?php $totalMarks = $oneMarks+(2*$twoMarks); ?>
	  <label for="psw"><b>Marks:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  name="psw" value="<?php echo $counter." Out of ".$totalMarks; ?>" readonly>
      
	  
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="Total Number of Questions"><b>Total Questions:&nbsp;&nbsp;</b></label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $maxQuestions; ?>" name="email" readonly><br> <br>
	  
	   <label for="Total Number of Questions"><b>Correct Attempts:</b></label>
       &nbsp;&nbsp;<input type="text" value="<?php echo $maxQuestions-$wrongAttemps; ?>" name="email" readonly>
	  
	  <br> <br>
      <label for="psw"><b>Wrong Attempts:</b></label>
      &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $wrongAttemps; ?>" name="psw" readonly>
		
	  
      <div class="clearfix">
        <button type="button" onclick="window.print()" class="cancelbtn">Create PDF</button>
        <button type="submit" class="signupbtn" onClick="document.location.href='feedback.php'" >Feedback</button>
      </div>
    </div>
  </form>

<?php
    
		$sqlCreateStudentRecordTable = "CREATE TABLE `online_exam`.`exam_result` ( `sr_no` INT(4) NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `marks` VARCHAR(20) NOT NULL , `subject` VARCHAR(50) NOT NULL , PRIMARY KEY (`sr_no`)) ENGINE = InnoDB;";
		mysqli_query($conn, $sqlCreateStudentRecordTable);
		
		$sqlStudentRecord = "INSERT INTO `exam_result` (`username`, `marks`, `subject`) VALUES ('".$_SESSION['studentName']."', '".$counter."', '".$_SESSION['subject']."' )";
		
		if(mysqli_query($conn, $sqlStudentRecord)>0){
			
		}
		else{
			echo "failed to enter the data";
		}
		
		mysqli_close($conn);
		
   unset($_SESSION["startedOfAdmin"]);
   unset($_SESSION["startedOfStudent"]);
?>


</body>
</html>

<?php }
else{
    echo "<h1>Access Forbidden!</h1>";
}?>


