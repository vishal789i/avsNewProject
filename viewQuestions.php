<?php session_start();?>
<?php if(isset($_SESSION['startedOfAdmin'])){?>

<!DOCTYPE html>
<html>
<head>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid  #ddd;
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

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/w3.css">
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


<center><h3 class="w3-red"><b>Question Bank</h3><center>
<!search for table>
<i>Type something in the input field to search the table for any field:</i>  <br>
  <input style="width:200px; class="form-control" id="customers" type="text" placeholder="               Search..">
  <br><br>
  <script>
$(document).ready(function(){
  $("#customers").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<!search for table end here>
  <?php
    
include_once 'DBConnection.php';
$subjectNameOnViewQuestion = $_SESSION['SubjectGV'];
$teacherID = $_SESSION['adminName'];
$sql = "SELECT * FROM question_set where teacherId = '".$teacherID."' AND subjectName = '".$subjectNameOnViewQuestion."' " ;
$sqll = "SELECT * FROM question_set where subjectName = '".$subjectNameOnViewQuestion."' " ;
//$sql = "SELECT * FROM question_set";

$result = mysqli_query($conn, $sql);


?>
<?php 
  $i= 0;
if (mysqli_num_rows($result) > 0) {?>
<table id="customers">
<tr>
    	<th>Sr_no</th>
      <th><h4><center>Question</th></h4></center>
    	<th><h4><center>Option1</th></h4></center>
    	<th><h4><center>Option2</th></h4></center>
    	<th><h4><center>Option3</th></h4></center>
    	<th><h4><center>Option4</th></h4></center>
    	<th><h4><center>Correct answer</th></h4></center> 
      <th><h4><center>Marks</th></h4></center>
      <th><h4><center>Course Outcome</th></h4></center>
      <th><h4><center>Time</th></h4></center>
      <th><h4><center>Teacher ID</th></h4></center>
      <th><h4><center>Update Count</th></h4></center>   	
</tr>
<?php 
  /*$i= 0;
if (mysqli_num_rows($result) > 0) {*/
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {?>
        <tbody id="myTable">
    <tr>
     <?php $array[$i] = $row['sr_no']; 
     $i = $i +1; ?>
    	<td><center><?php echo $i;?></td></center>
      
    	<td><center><?php echo $row['question'];?></td></center>
    	<td><center><?php echo $row['option1'];?></td></center>
    	<td><center><?php echo $row['option2'];?></td></center>
		<td><center><?php echo $row['option3'];?></td></center>
		<td><center><?php echo $row['option4'];?></td></center>
		<td><center><?php echo $row['f_answer'];?></td></center>
    <td><center><?php echo $row['M'];?></td></center>
    <td><center><?php echo $row['CO'];?></td></center>
    <td><center><?php echo $row['timeStamp'];?></td></center>
    <td><center><?php echo $_SESSION['adminName']?></td></center>
    <td><center><?php echo $row['count'];?></td></center>
     
    </tr>
    
<?php } ?>
</tbody>
</table>
<br><br><br><br>
<?php 

} else {
    echo "No result found ";
}

    
?> 
<?php 



$resultnew = mysqli_query($conn, $sqll);

?>
<?php 
  $j= 0;
if (mysqli_num_rows($resultnew) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultnew)) {?>
    
    
     <?php $arraynew[$j] = $row['sr_no']; 
     $j = $j +1; ?>
      
    
    
<?php } ?>
</table>
<br><br><br><br>
<?php 

} else {
    echo "No Results Found ! ";
}


 mysqli_close($conn);
//echo "Total number of questions you have uploaded are ".$i;
?>
<div class="w3-panel w3-teal w3-round-xlarge">
  <h4>Total number of questions you have uploaded are <?php echo $i; ?>  </h4>
</div>
<div class="w3-panel w3-cyan w3-round-xlarge">
  <h4>Total number of <?php echo $subjectNameOnViewQuestion ; ?> questions are <?php echo $j; ?></h4>
</div>

<?php
//$_SESSION["array"] = $array;
?>

<br><br><br><br><br>
<center><button onclick="myFunction()" class="w3-bar-item w3-button w3-teal">Print This Page</button>

<input type="button" value="Go Back" class="w3-red w3-bar-item w3-button " id="btnHome" onClick="document.location.href='adminSignIn.php'" /></center><br>
 <!-- SHOWCASE -->
    <section class="showcase w3-deep-purple">
      <div class="w3-container w3-center"> <hr>
        <h3 class="w3-text-shadow w3-animate ">Welcome To Edit, Delete and Replacement Section of PICT Online Exam Portal</h3>
        <hr>

        <form action="editPHP.php" method="post">
        <h4 style="color:yellow"; >Write the question number and press <i>'Edit Question' </i>button</h4> <br>
<center><input class="form-control" style="width:200px;" id="myInput" type="text"  name = "questionNumber" placeholder="Enter here" required=""></center><br><br>
 <center><button  class="w3-button w3-red w3-large">Edit Question</button></center>
  </form>
 <br>		
 <hr style="border-width: 15px;">
        
        <form action="deletePHP.php" method="post">
        <h4 style="color:yellow"; >Write the question number and press <i>'Delete Question' </i>button</h4> <br>
<center><input class="form-control" style="width:200px;" id="myInput" type="text"  name = "questionNumber" placeholder="         Enter here" required><br><br></center>
 <center><button  class="w3-button w3-red w3-large">Delete Question</button></center>
  </form>

 <br>    <hr style="border-width: 15px;"><br>

	    <center><button  onclick="document.getElementById('start-modal').style.display='block'" class="w3-button w3-red w3-large">Replace Question</button></center>
        <br>
		 <script type="text/javascript">
		$(document).ready(function () {
		    //Disable full page
		    $("body").on("contextmenu",function(e){
		        return false;+
		    });
		    
		    //Disable part of page
		    $("#id").on("contextmenu",function(e){
		        return false;
		    });
		});
		
		</script>
	  </div>
    </section>
    
	<!-- MODAL -->
    <div id="start-modal" class="w3-modal">
      <div class="w3-modal-content">
        <header class="w3-container w3-red">
          <span onclick="document.getElementById('start-modal').style.display='none'" class="w3-closebtn">&times;</span>
          <h2>Get Started</h2>
        </header>
          
        <div class="w3-container">
          <form action = updateQuestion.php method = "post">
            <div class="w3-section">
			
		
    <label>Enter Question No.</label><br>
    <input type="text" name="questionNo" required /><br><br>
        
      <p><b>Select Marks:</b></p>  
      <select name="Marks">
      <option value="1">1</option>
      <option value="2">2</option>
      </select>
      <br><br>
      <p><b>Select Course Outcome:</b></p>
      <select name="CO">
      <option value="CO1" selected>CO-1</option>
      <option value="CO2">CO-2</option>
    <option value="CO3">CO-3</option>
    <option value="CO4">CO-4</option>
      </select>
	
			<br><br>
              <label>Question</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Question" name="question" required>
			  
              <label>Option-1</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Options A" name="option1" required>
			  
              <label>Option-2</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Options B" name="option2" required>
			  
              <label>Option-3</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Options C" name="option3" required>
			  
			        <label>Option-4</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Options D" name="option4" required>
			  
			  <label>Upload Image:</label>
		      <input type="file" name="pic" id="pic"><br><br>
			  
			  <label>Correct Answer</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter A, B, C or D" name="f_answer" required>
			  
              <button class="w3-black w3-btn-block w3-section w3-padding" type = "submit" name = "questionSubmitButton">Upload</button>
			  
              <center><input type="button" value="Click Here to View Question Bank" class="homebutton w3-red" id="btnHome" onClick="document.location.href='viewQuestions.php'" /></center>
            </div>
          </form>
        </div>
      </div>
    </div>
	
	  
<script>
function myFunction() {
  window.print();
}
</script>



</body>
</html>

<?php }
else{
    echo "<h1>cannot access this page directly</h1>";

}?>
