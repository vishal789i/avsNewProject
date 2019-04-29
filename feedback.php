<?php include_once 'DBConnection.php';
	session_start();?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/w3.css">
	<link href="css/formCss.css" rel="stylesheet" type="text/css" />
	<link type="text/css" rel="stylesheet" href="css/nova.css" />
	<link type="text/css" media="print" rel="stylesheet" href="css/printForm.css" />
	<script src = "js/jquery.min.js"></script>
	<script src = "js/jquery-ui.min.js"></script>
	<script src="js/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="css/sweetalert.css">
	<style>
		body {font-family: Arial, Helvetica, sans-serif;background-color:#5a55a3;}
		* {box-sizing: border-box;
		 
		  
		}

		input[type=text], select, textarea {
		  width: 100%;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		  margin-top: 6px;
		  margin-bottom: 16px;
		  resize: vertical;
		}

		input[type=submit] {
		  background-color: #4CAF50;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		}

		input[type=submit]:hover {
		  background-color: #45a049;
		}

		.container {
		  border-radius: 5px;
		  background-color: #f2f2f2;
		  padding: 20px;
		}
	</style>
</head>
<body>
 <body>
    <!-- NAVIGATION -->
    <div class="w3-top">
      <div class="w3-bar w3-deep-purple">
        <span class="branding w3-bar-item w3-mobile">PICT EXAMINATION PORTAL</span>
        <span class="w3-right w3-mobile">
			<a class="w3-bar-item w3-button w3-mobile w3-hover-red" href="index.php">Log out</a>
        </span>
      </div>
    </div><br><br><br>


<h2 class="black"><center><b>Feedback Form</b></center></h2>
<h4 ><center>Please let us know your experience with our Online Examination portal ! </center></h4>
<div class="container">
  <form action="" method ="post" >
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your first name.." required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>
	
	<label for="lname">  E-mail</label>
    <input type="text" id="lname" name="email" placeholder="Your email.." required>

	<li class="form-line" data-type="control_scale" id="id_6">
        <label class="form-label form-label-top form-label-auto" id="label_6" for="input_6"> Please Rate Our Site : </label>
        <div id="cid_6" class="form-input-wide">
          <table summary="" cellPadding="4" cellSpacing="0" class="form-scale-table" data-component="scale">
            <tbody>
              <tr>
                <th>
                   
                </th>
                <th style="text-align:center">
                  <label> 1 </label>
                </th>
                <th style="text-align:center">
                  <label> 2 </label>
                </th>
                <th style="text-align:center">
                  <label> 3 </label>
                </th>
                <th style="text-align:center">
                  <label> 4 </label>
                </th>
                <th style="text-align:center">
                  <label> 5 </label>
                </th>
                <th>
                   
                </th>
              </tr>
              <tr>
                <td>
                  <label for="input_6_1"> Not Bad </label>
                </td>
				
                <td style="text-align:center">
                  <input type="radio" class="form-radio" name="rating" value="1" title="1" id="input_6_1" required="required"/>
                </td>
                <td style="text-align:center">
                  <input type="radio" class="form-radio" name="rating" value="2" title="2" id="input_6_2" required="required"/>
                </td>
                <td style="text-align:center">
                  <input type="radio" class="form-radio" name="rating" value="3" title="3" id="input_6_3" required="required"/>
                </td>
                <td style="text-align:center">
                  <input type="radio" class="form-radio" name="rating" value="4" title="4" id="input_6_4" required="required"/>
                </td>
                <td style="text-align:center">
                  <input type="radio" class="form-radio" name="rating" value="5" title="5" id="input_6_5" required="required"/>
                </td>
                <td>
                  <label for="input_6_5"> Excellent </label>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </li>
				<input type="hidden" name="formSubmitted"/>
    <label for="subject">How would you suggest to improve?</label>
    <textarea id="subject" name="suggestion" placeholder="Write something.." style="height:200px" required></textarea>

	<button class = "btn btn-success" type="submit" >Submit</button>
 
  </form>
  
  <?php
    
	if(isset($_POST['formSubmitted'])){
		$first = $_POST['firstname'];
		$last = $_POST['lastname'];
		$email = $_POST['email'];
		$rating = $_POST['rating'];
		$suggestion = $_POST['suggestion'];

		$sqlCreateFeedbackTable = "CREATE TABLE `feedbacks` ( `sr_no` int(5) NOT NULL AUTO_INCREMENT, `username` varchar(40) NOT NULL, `user_first` varchar(40) NOT NULL, `user_last` varchar(40) NOT NULL, `user_email` varchar(40) NOT NULL, `rating` varchar(10) NOT NULL, `suggestion` varchar(100) NOT NULL, PRIMARY KEY (`sr_no`) ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1";
		mysqli_query($conn, $sqlCreateFeedbackTable);

		$sqlFeedback = "INSERT INTO `feedbacks` (`username`, `user_first`, `user_last`, `user_email`, `rating`, `suggestion`) VALUES ('".$_SESSION['studentName']."', '".$first."', '".$last."', '".$email."', '".$rating."', '".$suggestion."')";
		
		if(!mysqli_query($conn, $sqlFeedback)){
			echo "fail";
		}else{?>
			<script>swal("Thanks For your feedback!!", "You can Logout now", "success")</script>
	<?php
		}	
	}
    mysqli_close($conn);
?>
  
</div><br><br><br>
 <!-- FOOTER -->
    <footer class="w3-black w3-padding-xlarge w3-center">
      <p>AVS Web Services and Solutions PVT. LTD.&copy; 2019</p>
    </footer>
</body>
</html>
