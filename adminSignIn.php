<?php session_start();?>
<?php if(isset($_SESSION['startedOfAdmin'])){?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/w3(admin).css">
    <link rel="stylesheet" href="css/style(adminsignup).css">
  </head>
  
  <?php 
		include_once 'DBConnection.php';
		$sqlEmpName = "SELECT * FROM adminlogins WHERE username = '".$_SESSION['adminName']."' ";
		$resultEmpName = mysqli_query($conn, $sqlEmpName);
		$empName = "";
		while($row = mysqli_fetch_assoc($resultEmpName) ) {
			$empName = $row["name"];
		}
		$_SESSION['empName'] = $empName;
  ?>
  <body>
    <!-- NAVIGATION -->
	
    <div class="w3-top">
      <div class="w3-bar w3-black">
        <span class="branding w3-bar-item w3-mobile">PICT EXAMINATION PORTAL <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Employee Name : ".$empName." &nbsp;&nbsp;&nbsp;Selected Subject : ".$_SESSION['SubjectGV']." ";?></span>
        <span class="w3-right w3-mobile">
          <a class="w3-bar-item w3-button w3-mobile w3-hover-red" href="#">Exam Section</a>
          <a class="w3-bar-item w3-button w3-mobile w3-hover-red" href="#result">Result Section</a>
		  <button class="w3-bar-item w3-button w3-mobile w3-hover-red" value="LOGOUT" class="homebutton" id="btnHome" onClick="document.location.href='index.php'" >Log Out</button>
        </span>
      </div>
    </div>

	
    <!-- SHOWCASE -->
    <section class="showcase">
      <div class="w3-container w3-center">
        <h1 class="w3-text-shadow w3-animate-opacity">Welcome To PICT Online Exam Portal Admin Section </h1>
        <hr>
        <h5 class="w3-animate-opacity "><br><br><br><br>
        <marquee> Now explore our simple way to create your exam.Lets begin with selecting your subject preference.</marquee></h5><br>
        <button onclick="document.getElementById('start-modal').style.display='block'" class="w3-button w3-red w3-large">Add single question</button>
		<button class="w3-button w3-red w3-large" onclick="window.location.href='uploadExcel.php'">Upload Excel file</button>
		<button class="w3-button w3-red w3-large" onclick="window.location.href='viewQuestions.php'">View Questions</button> 
		<!-- <button onclick="document.getElementById('select-subject').style.display='block'" class="w3-button w3-red w3-large">Select Subject</button> -->
		<button class="w3-button w3-red w3-large" onclick="window.location.href='subject_select.php'">Select Subject</button> 
	</div>
    <div class="w3-container">
  <!-- <h2>Select Subject</h2> -->
 <!--  <p>Move the mouse over the button to open the dropdown content.</p> -->
 <p>   </p>

      
      </div>
    </section>

    <!-- SECTION 2 -->
    <section class="section w3-light-grey w3-hover-opacity" id="result">
      <div class="w3-container w3-center">
        <i class="fa fa-cog"></i>
        <h2>Let's have results</h2>
        <p>Now generate exam results in even a better and smart way within seconds !</p>
      </div>
    </section>

    
    
    <section class="section w3-light-grey">
     <section class="showcase1">
      <div class="w3-container w3-center">
        <h1 class="w3-text-shadow w3-animate-opacity">Obtain the Results ! </h1>
        <hr>
        <h5 class="w3-animate-opacity "><marquee><b>Now explore our simple way to generate exam result by a single click upon a 'View Results'</h5><br></b></marquee>
        <br><br>
        <a href="studentResults.php">View Results</a>
        
		</div>
    </section>




   
    <!-- FOOTER -->
    <footer class="w3-black w3-padding-xlarge w3-center">
      <p>AVS Web Services and Solutions PVT. LTD.&copy; 2019</p>
	  
    </footer>

	
	
    <!-- MODAL -->
    <div id="start-modal" class="w3-modal">
      <div class="w3-modal-content">
        <header class="w3-container w3-red">
          <span onclick="document.getElementById('start-modal').style.display='none'" class="w3-closebtn">&times;</span>
          <h2>Get Started</h2>
        </header>
          
        <div class="w3-container">
          <form action = adminSignInPHP.php method = "post">
            <div class="w3-section">
	
	    <p><b>Select Marks:</b></p>  
      <select name="Marks">
      <option value="1" selected>One</option>
      <option value="2">Two</option>
      </select>
      <br><br>
      <p><b>Select CO:</b></p>
      <select name="CO">
      <option value="CO1" selected>CO1</option>
      <option value="CO2">CO2</option>
      </select>

			<br><br>
              <label>Question</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Question" name="question" required>
			  
              <label>Option-1</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Option A" name="option1" required>
			  
              <label>Option-2</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Option B" name="option2" required>
			  
              <label>Option-3</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Option C" name="option3" required>
			  
			  <label>Option-4</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Option D" name="option4" required>
			  
			  <label>Upload Image:</label>
		      <input type="file" name="pic" id="pic"><br><br>
			  
			  <label>Correct Answer</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter A, B, C or D" name="answer" required>
			  
              <button class="w3-black w3-btn-block w3-section w3-padding" type = "submit" name = "questionSubmitButton">Upload</button>
			  
              <center><input type="button" value="Click Here to View Question Bank" class="homebutton w3-red" id="btnHome" onClick="document.location.href='viewQuestions.php'" /></center>
            </div>
          </form>
        </div>
      </div>
    </div>
	


  </body>
</html>
<?php }
else{
    echo "<h1>Access Forbidden</h1>";
}?>
