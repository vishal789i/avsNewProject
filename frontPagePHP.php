<?php
    ob_start();
    session_start();

	include_once 'DBConnection.php'; //variables $conn
	
	$sqlSelectSrNo = "SELECT maxQuestions, oneMarks, twoMarks FROM adminvariables where sr_no = 1";
	$result = mysqli_query($conn, $sqlSelectSrNo);
	
	while($row = mysqli_fetch_assoc($result) ) {
		$_SESSION['maxQuestions'] = $row["maxQuestions"];
		$_SESSION['oneMarks'] = $row["oneMarks"];
		$_SESSION['twoMarks'] = $row["twoMarks"];
	}
	
	if(isset($_POST['signInStudentButton'])){
		$name = $_POST['signInStudentName'];
		$password = $_POST['signInStudentPassword'];  
		
		$_SESSION['subject'] = $_POST['subject'];
		
		$sql = "SELECT userName, password FROM studentLogins WHERE userName = '".$name."' AND password = '".$password."'";
		$result = mysqli_query($conn, $sql);
    
		if (mysqli_num_rows($result) > 0) {
		    
		    $_SESSION['startedOfStudent'] = true;
            $_SESSION['studentName'] = $name;
			
		    //header("Location: instructionPage.php", true, 301);
			?><script>window.open('instructionPage.php','_blank','height='+screen.height+', width='+screen.width);;</script>
    <?php
		    exit();
		} 
		else {
			echo "<br>Student Name OR Password is incorrect<br>";
			header('Refresh: 2; URL = index.php');
		}		
	}
	//admin sign in
	else if(isset($_POST['signInAdminButton'])){
		$name = $_POST['signInAdminName'];
		$password = $_POST['signInAdminPassword'];
			
		$sql = "SELECT username, password FROM adminLogins WHERE username = '".$name."' AND  password = '".$password."'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    
		    $_SESSION['startedOfAdmin'] = true;
		    $_SESSION['adminName'] = $name;
		    
			header("Location: adminSignIn.php", true, 301);
			exit();
			
		} 
		else {
			echo "<br>Admin Name OR Password is incorrect <br>";
			header('Refresh: 2; URL = index.php');
		}		
	}
	mysqli_close($conn);
	
?>