<?php  
    session_start();
    unset($_SESSION["startedOfAdmin"]);
    unset($_SESSION['startedOfStudent']);
    unset($_SESSION['instructionPage']);
	include_once 'DBConnection.php'; //variables $conn
	
?>

<?php $_SESSION['SubjectGV'] = "none"; ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PICT EXAMINATION PORTAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-white.css">
	<script src="js/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="css/sweetalert.css">
  </head>

  <body>
    <!-- NAVIGATION -->
    <div class="w3-top">
      <div class="w3-bar w3-deep-purple">
        <span class="branding w3-bar-item w3-mobile">PICT EXAMINATION PORTAL</span>
        <span class="w3-right w3-mobile">
          <a class="w3-bar-item w3-button w3-mobile w3-hover-red" href="#">Home</a>
          <a class="w3-bar-item w3-button w3-mobile w3-hover-red" href="#contact">Contact</a>
        </span>
      </div>
    </div>
    <!-- SHOWCASE -->
    <section class="showcase">
      <div class="w3-container w3-center">
        <h1 class="w3-text-shadow w3-animate">Welcome TO PICT ONLINE EXAM PORTAL</h1>
        <hr>
        <h3 allign center> OUR MISSION </h3>
        <p class="w3-animate">To be a distinguished center for nurturing the holistic development of globally competant young engineers and researchers in the field of Electronics and Telecommunication Engineering</p>
        <h3>Student</h3>       
	    <button onclick="document.getElementById('start-modal-stusignup').style.display='block'" class="w3-button w3-red w3-large ">Sign Up</button>
	    <button onclick="document.getElementById('start-modal-stusignin').style.display='block'" class="w3-button w3-red w3-large ">Sign In</button><br><br>
		<h3>Admin</h3> 
	    <button onclick="document.getElementById('start-modal-adsignup').style.display='block'" class="w3-button w3-red w3-large ">Sign Up</button>       
	    <button onclick="document.getElementById('start-modal-adsignin').style.display='block'" class="w3-button w3-red w3-large ">Sign In</button>
		 <script type="text/javascript">
		$(document).ready(function () {
		    //Disable full page
		    $("body").on("contextmenu",function(e){
		        return false;
		    });
		    
		    //Disable part of page
		    $("#id").on("contextmenu",function(e){
		        return false;
		    });
		});
		
		</script>
	  </div>
    </section>
    
    

    <!-- CONTACT HEADING -->
    <section id="contact" class="section w3-hover-opacity w3-dark-grey">
      <div class="w3-container w3-center">
	  <i class="fa fa-home"></i>
	     <!i class="fa fa-comment w3-red w3-padding-small w3-round-xlarge"></i>
        <h2 class="w3-text-shadow">Let's Get In Touch!</h2>
		<h4>Is there any problem? Send us an email and we will get back to you as soon as possible!
</h4>
      </div>
    </section>

    <!-- CONTACT -->
    <section class="section">
  <div class="w3-container">
        <div class="w3-card-4">
          <div class="w3-container w3-deep-purple">
            <h2>Contact Us</h2>
          </div>
               <div class="w3-container w3-center">
        <div class="w3-row">
          <div class="w3-col m3"><br>
            <i class="fa fa-comment w3-deep-purple w3-padding-small w3-round-xlarge"></i>
            <h3>PICT Admin</h3>
            <a href="mailto:someone@example.com?" target="_top">Send Mail</a>
          </div>
          <div class="w3-col m3"><br>
		  <i class="fa fa-comment w3-deep-purple w3-padding-small w3-round-xlarge"></i>
            <h3>Aditya Sisodiya</h3>
			 <a href="mailto:adityasisodiya1998@gmail.com?" target="_top">Send Mail</a>
          </div>
          <div class="w3-col m3"><br>
		  <i class="fa fa-comment w3-deep-purple w3-padding-small w3-round-xlarge"></i>
            <h3>Vishal Tandale</h3>
			 <a href="mailto:vishal.tandale@gmail.com?" target="_top">Send Mail</a>
          </div>
          <div class="w3-col m3"><br>
		  <i class="fa fa-comment w3-deep-purple w3-padding-small w3-round-xlarge"></i>
            <h3>Sudarshan Usnale</h3>
			 <a href="mailto:sudarshanusnale@gmail.com?" target="_top">Send Mail</a>
          </div>
        </div><br><br>
      </div>
          </div>
      </div>
    </section>	

    <!-- MODAL -->
	<!--student sign up-->
    <div id="start-modal-stusignup" class="w3-modal">
      <div class="w3-modal-content">
        <header class="w3-container w3-red">
          <span onclick="document.getElementById('start-modal-stusignup').style.display='none'" class="w3-button w3-display-topright">&times;</span>
          <h2>Student Sign Up</h2>
        </header>

        <div class="w3-container">
		
          <form action="" method = "post" id="createStudentForm">
            <div class="w3-section">
              <label>Name</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Name" name="createStudentName" required>
              <label>Username</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username eg. E2KXXXXXXXX" name="createStudentUserName" pattern="(?=.*[A-Z]).{11,11}" title="Please Enter Your 11 digit Registration ID e.g. E2K1XXXXXXX" required >
              <label>Password</label>
              <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name="createStudentPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              <label>Confirm Password</label>
              <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name="createStudentConfirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			  
              <button class="w3-black w3-btn-block w3-section w3-padding" type = "submit" name="studentCreateFormButton">Submit</button>
            </div>
          </form>
            
        </div>
      </div>
    </div>
	
	
	<!admin sign up>
	    <div id="start-modal-adsignup" class="w3-modal">
      <div class="w3-modal-content">
        <header class="w3-container w3-red">
          <span onclick="document.getElementById('start-modal-adsignup').style.display='none'" class="w3-button w3-display-topright">&times;</span>
          <h2>Admin Sign Up</h2>
        </header>

        <div class="w3-container">
		
          <form action = "" method = "post" id="createAdminForm">
            <div class="w3-section">
              <label>Name</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Name" name = "createAdminName" required>
              <label>Username</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username eg. empxxx" name = "createAdminUserName" required>
              <label>Password</label>
              <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name = "createAdminPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              <label>Confirm Password</label>
              <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name = "createAdminConfirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			  
              <button class="w3-black w3-btn-block w3-section w3-padding" type = "submit" name="adminCreateFormButton">Submit</button>
            </div>
          </form>
		  
        </div>
      </div>
    </div>
	
	
	
	
	<!student sign in>
	 <div id="start-modal-stusignin" class="w3-modal">
      <div class="w3-modal-content">
        <header class="w3-container w3-red">
          <span onclick="document.getElementById('start-modal-stusignin').style.display='none'" class="w3-button w3-display-topright">&times;</span>
		  <h2>Student Sign In</h2>
        </header>

        <div class="w3-container">
		
          <form action="frontPagePHP.php" method="post">
            <div class="w3-section">
              <label>Username</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username eg. E2K1XXXXXXX" name="signInStudentName" required>
              <label>Password</label>
              <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name="signInStudentPassword" required>
			  <label>Select Subject</label>
			  
              <select name="subject">
				<option value="OOP" selected>OOP</option>
				<option value="ITCTCN">ITCTCN</option>
				<option value="AP">AP</option>
				<option value="PE">PE</option>
			  </select>
			  
			  <br>
              <button class="w3-black w3-btn-block w3-section w3-padding" type="submit" name="signInStudentButton">Submit</button>
            </div>
          </form>
		  
        </div>
      </div>
    </div>
	
	
	<!admin sign in>
	 <div id="start-modal-adsignin" class="w3-modal">
      <div class="w3-modal-content">
        <header class="w3-container w3-red">
          <span onclick="document.getElementById('start-modal-adsignin').style.display='none'" class="w3-button w3-display-topright">&times;</span>
          <h2>Admin Sign In</h2>
        </header>

        <div class="w3-container">
		
          <form action="frontPagePHP.php" method="post">
            <div class="w3-section">
              <label>Username</label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username eg. E2KXXXXXXXX" name="signInAdminName" required>
              <label>Password</label>
              <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name="signInAdminPassword" required>
			  
              <button class="w3-black w3-btn-block w3-section w3-padding" type="submit" name="signInAdminButton">Submit</button>
            </div>
          </form>
		  
        </div>
      </div>
    </div>
	

    <script>
      function accFunction(id) {
          var x = document.getElementById(id);
          if (x.className.indexOf("w3-show") == -1) {
              x.className += " w3-show";
          } else {
              x.className = x.className.replace(" w3-show", "");
          }
      }
    </script>
	
	<!-- FOOTER -->
    <footer class="w3-black w3-padding-xlarge w3-center"><br><br>
      <p>AVS Web Services and Solutions PVT. LTD.&copy; 2019</p>
	         <div class="footer-social">
            <a href="#" class="social-icons"><i class="fa fa-facebook"></i></a>
			&nbsp;&nbsp;&nbsp;
            <a href="#" class="social-icons"><i class="fa fa-google-plus"></i></a>
			&nbsp;&nbsp;&nbsp;
            <a href="#" class="social-icons"><i class="fa fa-twitter"></i></a>
			<br><br>
        </div>
    </footer>
	
	<?php
	if( isset($_POST['studentCreateFormButton']) ){
		
		//create table if it is'nt present
		$tableSqlStudent = "CREATE TABLE `online_exam`.`studentLogins`( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `username` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
		
		mysqli_query($conn, $tableSqlStudent);
		
		if($_POST['createStudentPassword'] == $_POST['createStudentConfirmPassword']){
			
			$sql = "INSERT INTO `online_exam`.`studentlogins` (name, username, password) VALUES ('".$_POST["createStudentName"]."', '".$_POST["createStudentUserName"]."', '".$_POST["createStudentPassword"]."')";
			
			if (mysqli_query($conn, $sql)) {?>
				<script>swal("", "You Have Successfully Signed Up !", "success");</script>
			<?php
			}
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				header('Refresh: 2; URL = index.php');
			}			
		}
		else{?>
			<script>swal("", "Please re-enter correct confirm password", "warning");</script>
		<?php
		}
	}
	//admin sign up
	else if( isset($_POST['adminCreateFormButton']) ){
		//create table if it is'nt present
		$tableSqlAdmin = "CREATE TABLE `online_exam`.`adminLogins` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `username` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
		
		mysqli_query($conn, $tableSqlAdmin);
		
		if($_POST['createAdminPassword'] == $_POST['createAdminConfirmPassword']){
			
			$sqlAdmin = "INSERT INTO `online_exam`.`adminLogins` (name, userName, password) VALUES ('".$_POST["createAdminName"]."', '".$_POST["createAdminUserName"]."', '".$_POST["createAdminPassword"]."')";
			
			if (mysqli_query($conn, $sqlAdmin)) {?>
				<script>swal("", "You Have Successfully Signed Up !", "success");</script>
			<?php
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				header('Refresh: 2; URL = index.php');
			}			
		}
		else{?>
			<script>swal("", "Please re-enter correct confirm password", "warning");</script>
		<?php
		}
	}
	?>


  </body>
</html>
