<?php session_start();?>
<?php if(isset($_SESSION['instructionPage'])){
		unset($_SESSION["startedOfAdmin"]);
		unset($_SESSION["startedOfStudent"]);
	  }
?>
<?php if(isset($_SESSION['startedOfStudent']) && (isset($_SESSION['instructionPage'])==false)){?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Instruction Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/style(instruction).css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/jquery.min.js"></script>
	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body{
  background-color:#f1f1f1;
  }
  
</style>
</head>
<body>

   <!-- NAVIGATION -->
    <div class="w3-top">
      <div class="w3-bar w3-deep-purple">
        <span class="branding w3-bar-item w3-mobile">PICT EXAMINATION PORTAL</span>
        <span class="w3-right w3-mobile">
        </span>
      </div>
    </div>

	</div>
 
<div class="container">
  
 <br><br><br>
    <div class="panel panel-primary">
      <div class="panel-heading"><h4>Instructions:</h4></div>
      <div class="panel-body"><b>Read the following instructions carefully before appearing for the test:</b></h3>
	  
<h5><span class="glyphicon w3-green">&#xe013;</span>&nbsp;&nbsp;&nbsp;1) Select most appropriate (only one) answer. <br><br>
 <span class="glyphicon w3-green">&#xe013;</span>&nbsp;&nbsp;&nbsp;2) Students have to sign on attendance sheet before entering examination hall.<br><br>
 <span class="glyphicon w3-green">&#xe013;</span>&nbsp;&nbsp;&nbsp;3) If login name or / and password, do not appear in list, inform immediately to
examiner.<br><br>
 <span class="glyphicon w3-green">&#xe013;</span>&nbsp;&nbsp;&nbsp;4) Duration : 30 minutes<br><br>
 <span class="glyphicon w3-green">&#xe013;</span>&nbsp;&nbsp;&nbsp;6) Login using your username & password. Login will be examination seat no. of
the candidate.<br> <br>
 <span class="glyphicon w3-green">&#xe013;</span>&nbsp;&nbsp;&nbsp;7) No negative marking.<br><br>
 <span class="glyphicon w3-green">&#xe013;</span>&nbsp;&nbsp;&nbsp;8) For browsing, selecting a choice, student can make use of mouse or
keyboard.<br><br>

<span class="glyphicon w3-green">&#xe013;</span>&nbsp;&nbsp;&nbsp;9) You can select question sequence as per your choice. If you want, you can
navigate through questions ahead.<br><br>
<span class="glyphicon w3-green">&#xe013;</span>&nbsp;&nbsp;&nbsp;10) Student can re-visit the question & may change his choice if desires so. Later
answer will be stored and treated as final. <br><br>
<span class="glyphicon w3-green">&#xe013;</span>&nbsp;&nbsp;&nbsp;11) If you get login failure due to any reason, inform to Junior Supervisor
immediately.<br> <br>
<span class="glyphicon w3-green">&#xe013;</span></span>&nbsp;&nbsp;&nbsp;12) If any interruption occurs like power failure or other at laboratory, inform to Junior Supervisor immediately.
 <br><br>
<span class="glyphicon glyphicon-remove w3-red"></span>&nbsp;&nbsp;&nbsp;
13) Not allowed :<br>
 &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
 a) Cellphone
 b) Pen Drive
 <br><br>

<span class="glyphicon glyphicon-remove w3-red"></span>&nbsp;&nbsp;&nbsp;14) Do not reset / switch off your computer at your own. Inform the problem to
Junior Supervisor. Resetting or switching computer by student may be
considered as malpractice & necessary action might be taken. 
</h5>
<br><br>
    <button class="w3-red"type="button button1" id="myBtn" class="btnDisable " disabled onClick="document.location.href='questionPage.php'">Please wait...</button>
	</div>
    </div>

	</div>
<script>
    var sec = 15;		//set button timer here
    var myTimer = document.getElementById('myBtn');
    var myBtn = document.getElementById('myBtn');
    window.onload = countDown;

    function countDown() {
        if (sec < 10) {
            myTimer.innerHTML = "0" + sec;
        } else {
            myTimer.innerHTML = sec;
        }
        if (sec <= 0) {
            $("#myBtn").removeAttr("disabled");
            $("#myBtn").removeClass().addClass("btnEnable");
            $("#myTimer").fadeTo(2500, 0);
            myBtn.innerHTML = "Start Test";

			myBtn.style.background="green";
			myBtn.style.color="white";
            return;
        }
        sec -= 1;
        window.setTimeout(countDown, 1000);
    }
</script>

</body>
</html>


<?php }
else{
    echo "<h1>Access Forbidden</h1>";
}?>
