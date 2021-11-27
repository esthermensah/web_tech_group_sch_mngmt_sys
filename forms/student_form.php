<?php
require "../php/database_connection_test.php";

//check if form has been submitted
if(isset($_POST['SubmitButton'])){
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $gender=$_POST['gender'];
    $DOB=$_POST['DOB'];
    $nationality=$_POST['nationality'];
    $address=$_POST['address'];
    $class=$_POST['class'];
    $yeargroup=$_POST['yeargroup'];
    $coursename=$_POST['coursename'];
    $courserequirement=$_POST['courserequirement'];
    $department=$_POST['department'];
    $club=$_POST['club'];
    $account=$_POST['accountnumber'];
    $installment=$_POST['installment'];
    $amountpaid=$_POST['amountpaid'];
    $bhouse=$_POST['bhouse'];
    $roomnumber=$_POST['roomnumber'];
    $capacity=$_POST['housecapacity'];
    $noofrooms=$_POST['no_of_rooms'];
    $roomcapacity=$_POST['room_capacity'];
    $academicyear=$_POST['academicyear'];
    $tuition=$_POST['totalamount'];
    $presentno=$_POST['present_no'];
    $month=$_POST['month'];
    $score=$_POST['score'];
    $passgrade=$_POST['passgrade'];
    $subjectname=$_POST['subjectname'];
    $subjecttype=$_POST['subjecttype'];

    
    $insertdept ="INSERT INTO `department` (`departmentName`) VALUES (";
    $insertdeptcont=" '$department')";
    $insertdept = $insertdept.$insertdeptcont;
    $deptquery= mysqli_query($conn,$insertdept);

    $dept_id=null;
    if($deptquery){
        $dept_id=mysqli_insert_id($conn);
        echo "success";
    }else{
        echo "dept error".mysqli_error($conn);
    }

    $insertperson ="INSERT INTO `person` (`deptnum`,`firstname`, `lastname`, `gender`, `DOB`, `nationality`, `address`) VALUES (";
    $insertpersoncont=" '$dept_id', '$firstname', '$lastname', '$gender', '$DOB', '$nationality', '$address')";
    $insertperson = $insertperson.$insertpersoncont;
    $personquery= mysqli_query($conn,$insertperson);

    $person_id=null; $acc_id=null;
    if($personquery){
        $person_id=mysqli_insert_id($conn);
        echo "success";
    }

    $insertbhouse = "INSERT INTO `boardinghouse`(`HouseName`, `roomnumber`, `HouseCapacity`, `Numberofrooms`, `RoomCapacity`) VALUES(";
    $insertbhousecont = "'$bhouse', '$roomnumber', '$capacity', '$noofrooms', '$roomcapacity')";
    $insertbhouse = $insertbhouse.$insertbhousecont;
    $bhousequery = mysqli_query($conn, $insertbhouse);
    
    $bhouse_id=null;
    if($bhousequery){
        $bhouse_id=mysqli_insert_id($conn);
        echo "success";
    }else{
        echo "bhouse error".mysqli_error($conn);
    }

    $insertaccount="INSERT INTO `Fees`(`AccNum`,`installment`, `AmountPaid`)VALUES(";
    $insertaccountcont="'$account', '$installment', '$amountpaid')";
    $insertaccount=$insertaccount.$insertaccountcont;
    $accountquery=mysqli_query($conn,$insertaccount);

    if($accountquery){
        $acc_id=mysqli_insert_id($conn);
        echo "success";
    }else{
        echo "account error".mysqli_error($conn);
    }

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

    $insertresults = "INSERT INTO `results`(`score`) VALUES (";
    $insertresultscont = " '$score')";
    $insertresults = $insertresults.$insertresultscont;
    $resultquery = mysqli_query($conn,$insertresults);

    $result_id=null;
    if($resultquery){
        $result_id=mysqli_insert_id($conn);
        echo "success";
    }else{
        echo "course error".mysqli_error($conn);
    }

    $insertsubject ="INSERT INTO `subjects` (`nameofsubject`,`typeofsubject`) VALUES (";
    $insertsubjectcont=" '$subjectname', '$subjecttype')";
    $insertsubject = $insertsubject.$insertsubjectcont;
    $subjectquery= mysqli_query($conn,$insertsubject);

    $subject_id=null;
    if($subjectquery){
        $subject_id=mysqli_insert_id($conn);
        echo "success";
    }

    $insertstuinfo="INSERT INTO `students`(`HouseNo`,`SID`,`CourseID`,`class`, `yeargroup`, `club`) VALUES(";
    $insertstuinfocont = " '$bhouse_id','$person_id', '$course_id', '$class', '$yeargroup', '$club')";
    $insertstuinfo = $insertstuinfo.$insertstuinfocont;
    $stuinfoquery = mysqli_query($conn,$insertstuinfo);
    if($stuinfoquery){
        echo "success";
    }else{
        echo "student info error".mysqli_error($conn);
    }

    $studentsubject="INSERT INTO `studentsubject`(`SID`, `subjectID`) 
    VALUES('$person_id', '$subject_id')";
    $studentsubject2=mysqli_query($conn,$studentsubject);

    $insertstusubresults="INSERT INTO `studentsubjectresults`(`subjectID`,`academicyear`,`passgrade`,`Resultnum`) VALUES(";
    $insertstusubresultscont = " '$subject_id','$academicyear','$passgrade','$result_id')";
    $insertstusubresults = $insertstusubresults.$insertstusubresultscont;
    $stusubresultsquery = mysqli_query($conn,$insertstusubresults);
    if($stusubresultsquery){
        echo "success";
    }else{
        echo "student subject resultserror".mysqli_error($conn);
    }

    $feespayment="INSERT INTO `feespayment`(`SID`, `AccID`, `academicyear`, `totalamount`) 
    VALUES('$person_id', '$acc_id', '$academicyear', '$tuition')";
    $feespayment2=mysqli_query($conn,$feespayment); 

    if($stuinfoquery){
        echo "success";
    }else{
        echo "fees payment info error".mysqli_error($conn);
    }
        
    $attendance="INSERT INTO `attendance`(`SID`, `PresentNo`, `Months`) 
    VALUES('$person_id', '$presentno', '$month')";
    $attendance2=mysqli_query($conn,$attendance); 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Add New Student</title>
</head>
<body>
    <!-- creating nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand " href="../php/index.php"><img src="../images/logo.png" width="95.3" height="71.3"></a>
            <a href="../php/studentInfo.php"><button type="button" class="btn btn-secondary">Back</button></a>
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
    
    <!-- form for administrator input for adding new person -->
    <form class="row container m-auto"  action="student_form.php" method="post">
     
    <h6> Personal Information </h6>
    <div class="col-6 d-flex flex-column">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname" onInput="validateFname()">
        <span id="error"></span>
    </div>
   

    </script>
      
    <div class="col-6 d-flex flex-column">
        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname"  onInput="validateLname()">
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
        <input type="date" id="DOB" name="DOB" onInput="validateDate()" ><br>
        <span id="derror"></span>
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="nationality">Nationality</label>
        <input type="text" id="nationality" name="nationality" onInput="validateN()" >
        <span id="nerror"></span>
    </div>

    <div class="col-6 d-flex flex-column">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" onInput="validateA()" ><br>
            <span id="aerror"></span>
    </div>   

    <h6>School Info</h6>
    <div class="col-6 d-flex flex-column">
        <label for="class">Class:</label>
        <input type="text" id="class" name="class" onInput="validateC()"><br>
        <span id="cerror"></span>
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="yeargroup">Year Group:</label>
        <input type="number" id="yeargroup" name="yeargroup" onInput="validateYG()"><br>
        <span id="ygerror"></span>
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

    <div class="col-6 d-flex flex-column">
        <label for="department">Department:</label>
        <select name = "department" id="department">
            <option value = "choose" selected>    </option>
            <option value = "Science" name="Science">Science</option>
            <option value = "Maths" name="Maths">Maths</option>
            <option value = "English" name= "English">English</option>
            <option value = "Arts" name="Arts">Arts</option>
            <option value = "Business" name="Business">Business</option>
        </select>
    </div> 

     

    <h6>Subject </h6>
    <div class="col-6 d-flex flex-column">
            <label for="subjectname"> Name of Subject:</label>
            <input type="text" id="subjectname" name="subjectname"  onInput="validateNOS()"><br>
            <span id="serror"></span>


    </div>
    
    <div class="col-6 d-flex flex-column">
        <label for="subjecttype">Type of Subject:</label>
        <select name = "subjecttype" id="subjecttype">
            <option value = "choose" selected>    </option>
            <option value = "Core" name="Core">Core</option>
            <option value = "Elective" name="Elective">Elective</option>
        </select>
    </div>

    <h6>Class Attendance</h6>
    <div class="col-6 d-flex flex-column">
        <label for="present_no">Present No:</label>
        <input type="number" id="present_no" name="present_no" onInput="validateP()"><br>
        <span id="perror"></span>
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="month">Month:</label>
        <select name = "month" id="month"><br>
        <option value = "choose" selected>    </option>
        <option value = "January" name="January">January</option>
        <option value = "February" name="February">February</option>
        <option value = "March" name= "March">March</option>
        <option value = "April" name="April">April</option>
        <option value = "May" name="May">May</option>
        <option value = "June" name="June">June</option>
        <option value = "July" name="July">July</option>
        <option value = "August" name="August">August</option>
        <option value = "September" name="September">September</option>
        <option value = "October" name="October">October</option>
        <option value = "November" name="November">November</option>
        <option value = "December" name="December">December</option>
        </select>
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="club">Club:</label>
        <input type="text" id="club" name="club" onInput="validateCl()" ><br>
        <span id="clerror"></span>
    </div>

    <h6> Fees </h6>
    <div class="col-6 d-flex flex-column">
        <label for="accountnumber">Account Number:</label>
        <input type="number" id="accountnumber" name="accountnumber" onInput="validateAN()">
        <span id="anerror"></span>
    </div>
    
    <div class="col-6 d-flex flex-column">
        <label for="totalamount">Tuition Fee:</label>
     <p> GHC   <input type="number" id="totalamount" name="totalamount" onInput="validateTF()" ><br> </p>
     <span id="tferror"></span>
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="installment">Installment: </label>
        <input type="text" id="installment" name="installment">
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="amountpaid">Amount Paid:</label>
      <p> GHC  <input type="number" id="amountpaid" name="amountpaid" onInput="validateAP()"><br> </p>
      <span id="aperror"></span>
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="academicyear">Academic Year:</label>
        <input type="month" id="academicyear" name="academicyear"><br>
    </div>

    <h6>Boarding Info</h6>
    <div class="col-6 d-flex flex-column">
        <label for="bhouse">House Name:</label>
        <select name = "bhouse" id="bhouse"><br>
        <option value = "choose" selected>    </option>
        <option value = "peter_aladjetey" name="peter_aladjetey">Peter Aladjetey</option>
        <option value = "halm_addo" name="halm_addo">Halm Addo</option>
        <option value = "alema" name= "alema">Alema</option>
        <option value = "ellen" name="ellen">Ellen</option>
        <option value = "nanaoteng" name="nanaoteng">Nana Oteng</option>
        </select>
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="roomnumber">Room Number:</label>
        <input type="text" id="roomnumber" name="roomnumber"onInput="validateRN()" ><br>
        <span id="rnerror"></span>
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="housecapacity">House Capacity:</label>
        <input type="number" id="housecapacity" name="housecapacity" onInput="validateHC()" ><br>
        <span id="hcerror"></span>
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="no_of_rooms">No of Rooms:</label>
        <input type="number" id="no_of_rooms" name="no_of_rooms" onInput="validateNR()" ><br>
        <span id="nrerror"></span>
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="room_capacity">Room Capacity:</label>
        <input type="number" id="room_capacity" name="room_capacity" onInput="validateRC()"><br>
        <span id="rcerror"></span>
    </div>

    <h6>Result Info </h6>
    <div class="col-6 d-flex flex-column">
        <label for="score">Score:</label>
        <input type="text" id="score" name="score" onInput="validateSC()"><br>
        <span id="scerror"></span>
    </div>

    <div class="col-6 d-flex flex-column">
        <label for="passgrade">Pass Grade:</label>
        <input type="text" id="passgrade" name="passgrade" onInput="validatePG()"><br>
        <span id="pgerror"></span>
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