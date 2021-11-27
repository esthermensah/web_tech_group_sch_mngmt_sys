<!DOCTYPE html>
<html lang="en">
<he <?php
require "../php/database_connection_test.php";

if(isset($_POST['SubmitButton'])){ 
    $firstname = $_POST['fname']; 
    $lastname =$_POST['lname'];
    $gender=$_POST['gender'];
    $DOB=$_POST['DOB'];
    $nationality=$_POST['nationality'];
    $address=$_POST['address'];
    $prevschool=$_POST['prev_school'];
    $rawscore=$_POST['rawscore'];
    $coursename=$_POST['coursename'];
    $courserequirement=$_POST['courserequirement'];
    $parname = $_POST['parname'];
    $parnumber = $_POST['parnum'];
    $paraddress = $_POST['paraddress'];

    // inserting into potential student table
    $insertpstudent="INSERT INTO `potentialstudents` (`firstname`,`lastname`,`DOB`,`gender`,`nationality`, `address`, `PrevSchool`, `RawScore`, `ParentName`, `ParentNumber`, `ParentAddress`) VALUES (";
    $insertpstudentcont="'$firstname', '$lastname', '$gender', '$DOB', '$nationality', '$address', '$prevschool', '$rawscore', '$parname', '$parnumber', '$paraddress')";
    $insertpstudent= $insertpstudent.$insertpstudentcont;
    $pstudentquery=mysqli_query($conn,$insertpstudent);

    $ps_id=null;
    if($pstudentquery){
        $ps_id=mysqli_insert_id($conn);
        echo "success";
    }else{
        echo "course error".mysqli_error($conn);
    }

    // inserting into course table
    $insertcourse = "INSERT INTO `courses`(`CourseName`, `Courserequirement`) VALUES (";
    $insertcoursecont = " '$coursename', '$courserequirement')";
    $insertcourse = $insertcourse.$insertcoursecont;
    $coursequery = mysqli_query($conn,$insertcourse);

    $course_id=null;
    if($coursequery){
        $course_id=mysqli_insert_id($conn);
        echo "success";
    }else{
        echo "course error".mysqli_error($conn);
    }

    // inserting into Application Info Table
    $insertappInfo = "INSERT INTO `applicationinfo`(`CourseID`, `PS_ID`) VALUES (";
    $insertappInfocont = " '$course_id', '$ps_id')";
    $insertappInfo = $insertappInfo.$insertappInfocont;
    $appInfoquery = mysqli_query($conn,$insertappInfo);
}

?>ad>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Admit Student</title>
</head>
<body>
    <!-- creating nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand " href="../php/index.php"><img src="../images/logo.png" width="95.3" height="71.3"></a>
            <a href="../php/admissions.php"><button type="button" class="btn btn-secondary">Back</button></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse 
            " id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 bars" >
                <li class="nav-item">
                    <a class="nav-link active barsbars" aria-current="page" href="../php/index.php">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active barsbars" href="#">Calendar</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active barsbars" href="#">Help</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>

    <form class="row container m-auto"  action="potential_student_form.php" method="post">
     
    <h6> Personal Information </h6>
        <div class="col-6 d-flex flex-column">
            <label for="fname">First name:</label>
            <input type="text" id="fname" name="fname" onInput="validateFname()">
            <span id="error"></span>
        </div>
        
        <div class="col-6 d-flex flex-column">
            <label for="lname">Last name:</label>
            <input type="text" id="lname" name="lname" onInput="validateLname()">
            <span id="lerror"></span>
        </div>
        
        <div class="col-12">
            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
        </div>

        <div class="col-6 d-flex flex-column">
            <label for="DOB">Date of Birth:</label>
            <input type="date" id="DOB" name="DOB"  onInput="validateDate()"><br>
            <span id="derror"></span>
        </div>

        <div class="col-6 d-flex flex-column">
            <label for="nationality">Nationality</label>
            <input type="text" id="nationality" name="nationality" onInput="validateN()">
            <span id="nerror"></span>
        </div>

        <div class="col-6 d-flex flex-column">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" onInput="validateA()"><br>
                <span id="aerror"></span>
        </div>   

        <h6>School Info</h6>
        <div class="col-6 d-flex flex-column">
            <label for="prev_school">Previous School:</label>
            <input type="text" id="prev_school" name="prev_school" onInput="validatePS()" ><br>
             <span id="pserror"></span>

        </div>

        <div class="col-6 d-flex flex-column">
            <label for="rawscore">Raw Score:</label>
            <input type="number" id="rawscore" name="rawscore"  onInput="validateRawSC()"><br>
            <span id="rawscerror"></span>
        </div>

        <div class="col-6 d-flex flex-column">
            <label for="coursename">Course:</label>
            <select name = "coursename" id="coursename"><br>
            <option value = "choose" selected>    </option>
            <option value = "General Science" name="General Science">General Science</option>
            <option value = "Business" name="Business">Business</option>
            <option value = "General Arts" name= "General Arts">General Arts</option>
            <option value = "Visual Arts" name="Visual Arts">Visual Arts</option>
            <option value = "Agriculture" name="Agriculture">Agriculture</option>
            </select>
        </div>

        <div class="col-6 d-flex flex-column">
            <label for="courserequirement">Course Requirement:</label>
            <input type="text" id="courserequirement" name="courserequirement" onInput="validateCR()"><br>
<span id="crerror"></span>
        </div>

        <h6>Parent Info </h6>

        <div class="col-6 d-flex flex-column">
            <label for="parname">Parent Name:</label>
            <input type="text" id="parname" name="parname"  onInput="validatePN()"><br>
            <span id="pnerror"></span>
        </div>

        <div class="col-6 d-flex flex-column">
            <label for="parnum">Parent Number:</label>
            <input type="text" id="parnum" name="parnum" onInput="validatePNUM()"><br>
            <span id="pnumerror"></span>
        </div>

        <div class="col-6 d-flex flex-column">
            <label for="paraddress">Parent Address:</label>
            <input type="text" id="paraddress" name="paraddress" onInput="validatePA()"><br>
            <span id="paerror"></span>
        </div>

        <center>
            <div class="col-4 d-flex flex-column">
                <input type="submit"  name="SubmitButton" value="Submit">
            </div>
        </center>


       
    </form>
<script src="../javascript/formvalidation.js"></script>
</body>
</html>