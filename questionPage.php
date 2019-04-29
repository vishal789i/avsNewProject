<?php session_start();
	if( isset($_SESSION['startedOfStudent']) ){
	include_once 'DBConnection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style(questionpage).css">
	<link rel="stylesheet" href="css/w3.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script src = "js/jquery.min.js"></script>
	<script src = "js/jquery-ui.min.js"></script>
	<script src="js/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="css/sweetalert.css">
</head>
<body>

<?php $_SESSION['instructionPage'] = true;?>

<?php $_SESSION['timerSetByQuestionPaper'] = time(); ?>

<script src="js/jquery.min.js"></script>

<section class="w3-top">
   <!-- NAVIGATION -->
    <div class="w3-top">
    <div class="w3-bar w3-deep-purple">
		<center><h4>PICT ONLINE EXAM PORTAL</h4></center>

<style>
.chip {
  display: inline-block;
  padding: 0 25px;
  height: 50px;
  font-size: 16px;
  line-height: 50px;
  border-radius: 25px;
  background-color: #f1f1f1;
}

.chip img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 50px;
  width: 50px;
  border-radius: 50%;
}
</style>

<?php
	$sqlSelectTime = "SELECT * FROM adminvariables where sr_no = 1";
	$resultTime = mysqli_query($conn, $sqlSelectTime);
	$noOfOneMarkQuestions = 0;
	$noOfTwoMarkQuestions = 0;
	while($row = mysqli_fetch_assoc($resultTime) ) {
		$time = $row["time"];
		$noOfOneMarkQuestions = $row["oneMarks"];
		$noOfTwoMarkQuestions = $row["twoMarks"];
	}
?>
<h3>User ID : <?php echo $_SESSION['studentName']; ?></h3>

<!-- timer section -->


<div class="time">Time Left: <span id="time"><?php echo $time; ?>m 00s</span></div>


<script>
	var requiredTime = <?php echo $time; ?>;	//change this variable
	
	var deadline = new Date();
	deadline.setMinutes( deadline.getMinutes() + requiredTime );
	
	var date = new Date();

	var x = setInterval(function() { 
	var now = new Date().getTime(); 
	var t = deadline - now; 
	
	var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
	var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
	var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
	var seconds = Math.floor((t % (1000 * 60)) / 1000); 
	document.getElementById("time").innerHTML = minutes + "m " + seconds + "s "; 
	
		if (t < 0) { 
			clearInterval(x); 
			document.getElementById("time").innerHTML = "EXPIRED"; 
			document.getElementById("questionsForm").submit();
		}
	}, 1000);
</script> 
<!-- end of timer section -->

</header>
    </div>
    </div>
</section><br><br><br><br>

<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<?php $maxQuestions = $_SESSION['maxQuestions']; ?>

<style>
.grid-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
}


.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  font-size: 1px;
  border:1px;	
  text-align: center;
}

button {
  height: 60px;
  background-color: #fff;
  border-radius: 3px;
  border: 1px solid #c4c4c4;
  background-color: transparent;
  font-size: 2rem;
  color: #333;
  background-image: linear-gradient(to bottom,transparent,transparent 50%,rgba(0,0,0,.04));
  box-shadow: inset 0 0 0 1px rgba(255,255,255,.05), inset 0 1px 0 0 rgba(255,255,255,.45), inset 0 -1px 0 0 rgba(255,255,255,.15), 0 1px 0 0 rgba(255,255,255,.15);
  text-shadow: 0 1px rgba(255,255,255,.4);
}

<!for legend>
fieldset.scheduler-border {
    border: 15 px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }

</style>


<script type="text/javascript">
function JSalert(){
	swal({
	  title: "Are you sure you want to submit the exam ?",
	  text: "Click OK to Submit",
	  type: "warning",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  showLoaderOnConfirm: true
	}, function () {
		setTimeout(function () {
		swal("Answers successfully Submitted!");
		document.getElementById("questionsForm").submit();
	  }, 2000);
	});
}

</script>
<?php
	$sqlOne = "SELECT * FROM question_set HAVING M = 1 AND subjectName = '".$_SESSION['subject']."' ";
	$resultOne = mysqli_query($conn, $sqlOne);
	
	$numbersOne = array();
	$countOne = 0;

	while($row = mysqli_fetch_assoc($resultOne)) {
		if($countOne < $noOfOneMarkQuestions){
			$numbersOne[$countOne++] = $row["sr_no"];
		}
	}
	
	$sql = "SELECT * FROM question_set HAVING M = 2 AND subjectName = '".$_SESSION['subject']."'";
	$result = mysqli_query($conn, $sql);
	
	$numbers = array();
	$count = 0;

	while($row = mysqli_fetch_assoc($result)) {
		if($count < $noOfTwoMarkQuestions){
			$numbers[$count++] = $row["sr_no"];
		}
	}
	
	$finalArray = array_merge($numbersOne, $numbers);
	shuffle($finalArray);
	$length = count($finalArray);
	$_SESSION['globalLength'] = $length;
?>

<?php
/*	$sql = "SELECT * FROM question_set HAVING subjectName = '".$_SESSION['subject']."' ";
	$result = mysqli_query($conn, $sql);
	
	$numbers = array();
	$count = 0;

	while($row = mysqli_fetch_assoc($result) ) {
		$numbers[$count++] = $row["sr_no"];
	}
	shuffle($numbers);
*/?>

<?php /*$minQuestions = min( count($numbers), $_SESSION['maxQuestions'] ); ?>
<?php $_SESSION['minQuestions'] = $minQuestions;*/ ?>
<script>
	function setColor(btn, color){
		var property = document.getElementById(btn);
		property.style.backgroundColor = color
		property.style.color="white";
	}
	function setColor1(btn, color){
		var property = document.getElementById(btn);
		property.style.backgroundColor = "#FFFFFF"
		property.style.color="black";
	}
	
</script>
<div class = "tab">
<br>
<div class="grid-container">
			<button class="w3-hover-deep-purple" onclick="openCity(event, 'question1')" id="defaultOpen1">1</button>
<?php for($i=2; $i<=$length; $i++){?>
		<div class = "grid-item">
			<button class="w3-hover-deep-purple" onclick="openCity(event, 'question<?php echo $i;?>')" id="defaultOpen<?php echo $i; ?>"><?php echo $i;?></button>
		</div>
<?php } ?>

</div>
<button class="w3-red w3-hover-deep-purple" type="submit" form=""  onclick="JSalert()" ><center>Submit Exam</center></button>

</div>

<form action="questionPagePHP.php" class="new" method = "post" id = "questionsForm">

<?php for ($i = 1; $i <= $length; $i++) {?>

    <?php 
    $sqlQuestion = "SELECT * FROM question_set WHERE sr_no = '".$finalArray[$i-1]."'"; ?>
    
    <!-- div id and 2nd argument of openCity must be same -->
    
    <?php $fetchedQuestion = mysqli_query($conn, $sqlQuestion)?>
        
    <div id="question<?php echo $i; ?>" class="tabcontent" id = "1st" ng-app="">
    
    <?php while($row = mysqli_fetch_assoc($fetchedQuestion)) {?>
	<br>
            <fieldset class="scheduler-border">
            <legend class="scheduler-border"><b>	[<?php echo $row["CO"]; ?>] [Marks:<?php echo $row["M"]; ?>]</b></legend>
    		<h4> <code><?php echo "Q $i. ".$row["question"]; ?> </code></h4>
    		
    		<input type="hidden" name ="sr_no<?php echo $i; ?>" value="<?php echo $row["sr_no"]; ?>"/>
    		
    		<label class="container"><p>A)
    		<input type="radio" name="question<?php echo $i;?>SelectedOption" value="A" onclick="setColor('defaultOpen<?php echo $i; ?>', 'green')"> <code><?php echo $row["option1"]; ?> </code>	
    		<span class="checkmark"></span>
    		</label></p>
			
    		<label class="container"><p>B)	
    		  <input type="radio" name="question<?php echo $i;?>SelectedOption" value="B" onclick="setColor('defaultOpen<?php echo $i; ?>', 'green')"> <code> <?php echo $row["option2"]; ?> </code>
    		  <span class="checkmark"></span>
    		</label></p>
			
    		<label class="container"><p>C)	
    		  <input type="radio" name="question<?php echo $i;?>SelectedOption" value="C" onclick="setColor('defaultOpen<?php echo $i; ?>', 'green')"> <code> <?php echo $row["option3"]; ?> </code>
    		  <span class="checkmark"></span>
    		</label></p>
			
    		<label class="container"><p>D)	
    		  <input type="radio" name="question<?php echo $i;?>SelectedOption" value="D" onclick="setColor('defaultOpen<?php echo $i; ?>', 'green')"> <code> <?php echo $row["option4"]; ?> </code>
    		  <span class="checkmark"></span>
    		</label> </p>
			
			<input type="button" value = "Invalid" class="w3-deep-orange" onclick="setColor('defaultOpen<?php echo $i; ?>', '#ff5722')";/>
			<input type="button" value = "Bookmark" class="w3-blue" onclick="setColor('defaultOpen<?php echo $i; ?>', '#2196F3')";/>
	</div>
    
    <?php } ?><!-- while loop -->

<?php } ?><!-- for loop -->

<button id="submit-form" type="submit" name="formSubmitted" hidden="hidden" onclick="JSalert()">Confirm Answers</button>

 </fieldset>
</form>

<?php mysqli_close($conn);?>

<script>
function openCity(evt, cityName) {

  var i, tabcontent, tablinks;
  
  tabcontent = document.getElementsByClassName("tabcontent");
  
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  
  tablinks = document.getElementsByClassName("tablinks");
  
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  
  document.getElementById(cityName).style.display = "block";
  
  evt.currentTarget.className += " active";
  
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen1").click();
</script>


</body>

<script>
      $(document).ready(function() {
        function disablePrev() { window.history.forward() }
        window.onload = disablePrev();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
      });
</script>

<script>
$('button').on("click",function(){  
  //$('button').not(this).removeClass();
  $(this).toggleClass('active');
  
  });

.active{background-color:red;}
</script>

</html> 


<?php }
else{
    echo "<h1>Access Forbidden</h1>";

}?>

