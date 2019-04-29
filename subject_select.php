<?php session_start();?>
<?php if(isset($_SESSION['startedOfAdmin'])){?>

<!DOCTYPE html>
<html>
<head>
  <title>subject select page</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-select.css">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="bootstrap-select.js"></script>
  
	   <link rel="stylesheet" href="css/w3.css">
  <style>
	body{
		background-color:#666666;
	}
  </style>
</head>
<body>
<!-- NAVIGATION -->
    <div class="w3-top">
      <div class="w3-bar w3-deep-purple">
        <span class="branding w3-bar-item w3-mobile">PICT EXAMINATION PORTAL<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Employee Name : ".$_SESSION['empName']."&nbsp;&nbsp;&nbsp;Selected Subject : ".$_SESSION['SubjectGV']." ";?></span>
        <span class="w3-right w3-mobile">
        </span>
      </div>
    </div><br><br><br><br>
<marquee class="w3-red">Now explore our smart way to design your test parameters!</marquee> 
<div class="container">
  
 <br><br><br>
    <div class="panel panel-primary">
      <div class="panel-heading">Instructions:</div>
      <div class="panel-body"><b>Read the folowing instructions carefully before designing the test:</b></h3>
<h5>1)Please enter the number of maximum questions and time duration of test and click upon <i>'Set Questions and Timer'</i> button.
<br><br>
2) Select only one subject from either :<br>
   &nbsp;&nbsp; &nbsp;FE or SE or TE or BE sections provide below.
  <br><br>
3) Click upon <i>'Select Subject'</i> button provided below.<br><br>
4) Click upon <i>'Back..'</i> button to exit from this section.
</h5>
<br>
   <a class="w3-bar-item w3-button w3-mobile w3-red w3-hover-gray" href="adminSignIn.php">Back..</a></div>
    </div><br><br><br><br>
	
	
	</form>
	<form method="post" action="">
		
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
		<font color="white">No. of Max Questions : </font><input type = "text" name="maxQuestions" >
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
		<font color="white">Exam Timer (in mins) : </font><input type = "text" name="time" ><br><br><br><br>

		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
		<font color="white">No. of 1 Mark Questions : </font><input type = "text" name="1Marks" >
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
		<font color="white">No. of 2 Marks Questions : </font><input type = "text" name="2Marks" ><br><br><br><br>
		
		<?php 
			include_once 'DBConnection.php';
			$sqlCreateAdminVariablesTable = "CREATE TABLE `adminvariables` ( `sr_no` int(11) NOT NULL AUTO_INCREMENT, `maxQuestions` int(100) NOT NULL, `time` int(100) NOT NULL, PRIMARY KEY (`sr_no`), UNIQUE KEY `maxQuestions` (`maxQuestions`) ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;";
			mysqli_query($conn, $sqlCreateAdminVariablesTable);
			
			$sqlDefaultValues = "INSERT INTO `adminvariables` (`sr_no`, `maxQuestions`, `time`) VALUES ('1', '15', '30');";
			mysqli_query($conn, $sqlDefaultValues);
			
			
			if(isset($_POST['maxQuestions'])){
				$sql = "UPDATE `adminvariables` SET `maxQuestions` = '".$_POST['maxQuestions']."', `time` = '".$_POST['time']."', `oneMarks` = '".$_POST['1Marks']."', `twoMarks` = '".$_POST['2Marks']."' WHERE `adminvariables`.`sr_no` = 1;";
				$totalMarks = $_POST['1Marks'] + (2*$_POST['2Marks']);
				if(mysqli_query($conn, $sql)>0){
					echo "<center>".$_POST['maxQuestions']." Questions will appear for your test for ".$_POST['time']." minutes. </center>";
					echo "<center><b>".$_POST['2Marks']."</b>: 2 Marks Questions and <b>".$_POST['1Marks']."</b>: 1 Marks Question will appear in your test.  </center>";
					echo "<br><center>Total Marks = ".$totalMarks."</center>";
				}
				else{
					echo "failed to set the number of questions";
				}
				
				mysqli_close($conn);				
			}
		?><br><br>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
		<input type = "submit" class="w3-bar-item w3-button w3-teal" value="Set Questions and Timer">
	</form>
	<br><br>
	
<div class="container">
  <form class="form-inline" role="form" action = session.php method = "post">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
    <div class="form-group">
      <label for="multipleSelect1" class="col-lg-2 control-label">FE</label>
	  <br>
      <div class="col-lg-10">
        <select id="multipleSelect1" name="subjectSelection" class="selectpicker show-menu-arrow form-control" multiple>
          <option value="M-I">M-I</option>
      <option value="M-II">M-II</option>
      <option value="BCE" >BCE</option>
      <option value="BME">BME</option>
        <option value="BXE">BXE</option>
         <option value="EG">EG</option>
      <option value="EP" >EP</option>
      <option value="EC">EC</option>
        <option value="BEE">BEE</option>
        <option value="FPL-I">FPL-I</option>
		 <option value="FPL-II">FPL-II</option>
          
        </select>
      </div>
    </div>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="form-group">
      <label for="multipleSelect2" class="col-lg-2 control-label">SE</label>
<br>
      <div class="col-lg-10">
        <select id="multipleSelect2" name="subjectSelection" class="selectpicker show-menu-arrow form-control" multiple>
          <option value="DSA">DSA</option>
      <option value="OOP">OOP</option>
      <option value="IC" >IC</option>
        <option value="S&S">S&S</option>
         <option value="M-III">M-III</option>
      <option value="CS" >CS</option>
      <option value="DE">DE</option>
        <option value="EDC">EDC</option>
        <option value="AC">AC</option>
		</select>
      </div>
    </div>
      
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="form-group">
      <label for="multipleSelect2" class="col-lg-2 control-label">TE</label>
<br>
      <div class="col-lg-10">
        <select id="multipleSelect2" name="subjectSelection" class="selectpicker show-menu-arrow form-control" multiple>
          <option value="MC">MC</option>
         <option value="DC">DC</option>
         <option value="DSP">DSP</option>
         <option value="EM">EM</option>
     
         <option value="SPOS">SPOS</option>
     <option value="ITCTCN" >ITCTCN</option>
         <option value="AP" >AP</option>
         <option value="PE">PE</option>
         <option value="BM">BM</option>
    </select>
      </div>
    </div>
	
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="form-group">
      <label for="multipleSelect2" class="col-lg-2 control-label">BE</label>
<br>
      <div class="col-lg-10">
        <select id="multipleSelect2" name="subjectSelection" class="selectpicker show-menu-arrow form-control" multiple>
          
      
      <option value="IOT">IOT</option>
        <option value="RTOS">RTOS</option>
         <option value="CN">CN</option>
    </select>
      </div>
    </div><br><br><br><br>
	<center><button type="submit" class="btn btn-success" name = "subjectSelectionButton">Select Subject</button></center>
	</form>
</div>
<br><br>


<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
</body>
</html>
<?php }?>