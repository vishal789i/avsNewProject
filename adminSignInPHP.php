<?php session_start();?>
<?php if(isset($_SESSION['startedOfAdmin'])){?>

<?php

include_once 'DBConnection.php';  //var $conn
  $subjectS = $_SESSION["SubjectGV"];
    if( isset($_POST['questionSubmitButton']) ){
        
        //create table if it is'nt present
       /* $tableSqlQuestions = "CREATE TABLE `online_exam`.`question_set` (
                                `sr_no` int(4) NOT NULL AUTO_INCREMENT,
                                `question` varchar(255) NOT NULL,
                                `option1` varchar(255) NOT NULL,
                                `option2` varchar(255) NOT NULL,
                                `option3` varchar(255) NOT NULL,
                                `option4` varchar(255) NOT NULL,
                                `f_answer` varchar(255) NOT NULL,
                                 PRIMARY KEY (`sr_no`)
                            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
        
    $sqlSelectLastSrNo = "SELECT sr_no FROM `online_exam`.`question_set`;
    
    
    
    
            mysqli_query($conn, $tableSqlQuestions); */
            /*$subjectS = $_SESSION["SubjectGV"];
            echo "Subject name is: " .$subjectS ;*/
            $sub = $_POST["subject"];
            $marks = $_POST["Marks"];
            $co = $_POST["CO"];
            //$subSected = $_POST["SubSelection"];
           // $_SESSION["subSel"] = $_POST["subjectSelection"];
            //$subjectSelected = $_POST["subjectSelection"];
        
           /* $subjectSelected = $_POST["subjectSelection"];
           echo "Selected subject is ".$subjectSelected ;*/

            
            $teacherID = $_SESSION['adminName'];
        
            $sqlQuestion = "INSERT INTO `online_exam`.`question_set` (question, option1 , option2 , option3, option4, f_answer, subjectName, teacherId, M, CO) VALUES ('".$_POST["question"]."', '".$_POST["option1"]."', '".$_POST["option2"]."', '".$_POST["option3"]."', '".$_POST["option4"]."', '".$_POST["answer"]."', '$subjectS', '$teacherID', '$marks', '$co')";
            
            if (mysqli_query($conn, $sqlQuestion)) {
                echo "<br> Question submitted successfully into database <br>";
                header('location: adminSignIn.php');
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    }

?>
<!--<footer>
           <?php/* 
           $subjectSelected = $_POST["subjectSelection"];
           $_SESSION["SubjectGV"] = $subjectSelected; 
           echo "Selected subject is ".$subjectSelected; */?>
<input type="button" value="click here to view questions" class="homebutton" id="btnHome" onClick="document.location.href='viewQuestions.php'" />
</footer> -->

<?php } 
else{
    echo "<h1>cannot access this page directly</h1>";

}?>
