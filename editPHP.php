<?php session_start();?>
<?php if(isset($_SESSION['startedOfAdmin'])){?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>pict online examination system</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/editform.css" rel="stylesheet" media="all">
</head>

<body>

<?php
include_once 'DBConnection.php';
$i = 1;
$subjectNameOnViewQuestion = $_SESSION['SubjectGV'];
$teacherID = $_SESSION['adminName'];
$sql = "SELECT * FROM question_set where teacherId = '".$teacherID."' AND subjectName = '".$subjectNameOnViewQuestion."' " ;
//$sql = "SELECT * FROM question_set";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     
     $array[$i] = $row['sr_no']; 
     $i = $i +1;   
} 
}
else 
{
    echo "0 results";
}

$k = $_POST['questionNumber'];
$srNo = $array[$k];
$sqll = "SELECT * FROM question_set where sr_no = '".$srNo."' AND teacherId ='".$teacherID."' AND subjectName = '".$subjectNameOnViewQuestion."' " ;
//$sql = "SELECT * FROM question_set";
$resultt = mysqli_query($conn, $sqll);

if (mysqli_num_rows($resultt) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultt)) {
     
     $Question=$row['question'];
     $Option1=$row['option1'];
     $Option2=$row['option2'];
     $Option3=$row['option3'];
     $Option4=$row['option4'];
     $correctAns=$row['f_answer'];
     $marks=$row['M']; 
     $Course=$row['CO'];
} 
}
else 
{
    echo "";
}


?>

    <?php if($i>$k){ ?>

    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Edit required fields</h2>
                </div>
                <div class="card-body">
                    <form action = "updateQuestion.php" method="POST">
                       
                         <div class="form-row">
                            <div class="name">Question Number</div>
                            <div class="value">
                                <input class="input--style-6" type="text" placeholder="Enter Question"  name = "questionNo" value="<?php echo $k; ?>" readonly>
                            </div>
                        </div>
						 <div class="form-row">
                            <div class="name">Marks</div>
                            <div class="value">
                                <input class="input--style-6" type="text" placeholder="Enter Question"  name="Marks" value="<?php echo $marks; ?>" size="1">
                            </div>
                        </div>
						 <div class="form-row">
                            <div class="name">Course Outcome</div>
                            <div class="value">
                                <input class="input--style-6" type="text" placeholder="Enter Question"  name="CO" value="<?php echo $Course; ?>">
                            </div>
                        </div>
						
						  <div class="form-row">
                            <div class="name">Question</div>
                            <div class="value">
                                <input class="input--style-6" type="text" placeholder="Enter Question"  name="question" value="<?php echo $Question; ?>">
                            </div>
                        </div>
						 <div class="form-row">
                            <div class="name">Option-1</div>
                            <div class="value">
                                <input class="input--style-6" type="text" placeholder="Enter Options A" name="option1" value="<?php echo $Option1; ?>">
                            </div>
                        </div> 
						<div class="form-row">
                            <div class="name">Option-2</div>
                            <div class="value">
                                <input class="input--style-6" type="text" placeholder="Enter Options B" name="option2" minlength="2" maxlength="3" value="<?php echo $Option2; ?>">
                            </div>
                        </div> 
						<div class="form-row">
                            <div class="name">Option-3</div>
                            <div class="value">
                                <input class="input--style-6" type="text" placeholder="Enter Options C" name="option3" value="<?php echo $Option3; ?>">
                            </div>
                        </div>
						 <div class="form-row">
                            <div class="name">Option-4</div>
                            <div class="value">
                                <input class="input--style-6" type="text" placeholder="Enter Options D" name="option4" value="<?php echo $Option4; ?>">
                            </div>
                        </div> 
						 <div class="form-row">
                            <div class="name">Correct Answer</div>
                            <div class="value">
                                <input class="input--style-6" type="text" placeholder="Enter Options D" name="f_answer" value="<?php echo $correctAns; ?>">
                            </div>
                        </div> 
                       
                        <div class="form-row">
                            <div class="name">Upload Image</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file_cv" id="file">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Upload image of file size 50 MB</div>
                            </div>
                        </div>
                    
                </div>
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } 
    else{
       // header('location: viewQuestions.php');
        ?> <script>alert('Entered question number is greater than the available questions');</script><?php
            header('Refresh: 0.5; URL = viewQuestions.php');
    }

    ?>


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

<?php }
else{
    echo "<h1>cannot access this page directly</h1>";

}?>
<!-- end document-->