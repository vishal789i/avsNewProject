  <?php session_start();?>
  <?php if(isset($_SESSION['startedOfAdmin'])){?>

  <?php
  include_once 'DBConnection.php';  //var $conn
  ?>

      <?php 
             $subjectSelected = $_POST["subjectSelection"];
             $_SESSION["SubjectGV"] = $subjectSelected; 
             echo "Selected subject is ".$subjectSelected;
             header('location: adminSignIn.php');
    ?>

  <footer>
  <input type="button" value="Go Back" class="homebutton" id="btnHome" onClick="document.location.href='adminSignIn.php'" />
  </footer>


  <?php } 
  else{
      echo "<h1>cannot access this page directly</h1>";

  }?>
