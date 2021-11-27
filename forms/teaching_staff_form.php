<?php 
require "../php/database_connection_test.php";

//checking if the submit button has been pressed
if(isset($_POST['SubmitButton'])){
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $gender=$_POST['gender'];
    $DOB=$_POST['DOB'];
    $nationality=$_POST['nationality'];
    $address=$_POST['address'];
    $deptname=$_POST['deptname'];
    $subjectname=$_POST['subjectname'];
    $subjecttype=$_POST['subjecttype'];
    $SSN=$_POST['SSN'];
    $salary=$_POST['salary'];

    //inserting into department table
    $insertdept ="INSERT INTO `department` (`departmentName`) VALUES (";
    $insertdeptcont=" '$deptname')";
    $insertdept = $insertdept.$insertdeptcont;
    $deptquery= mysqli_query($conn,$insertdept);

    $dept_id=null;
    if($deptquery){
        $dept_id=mysqli_insert_id($conn);
        echo "success";
    }else{
        echo "dept error".mysqli_error($conn);
    }
    
    //inserting into person table
    $insertperson ="INSERT INTO `person` (`deptnum`,`firstname`, `lastname`, `gender`, `DOB`, `nationality`, `address`) VALUES (";
    $insertpersoncont=" '$dept_id','$firstname', '$lastname', '$gender', '$DOB', '$nationality', '$address')";
    $insertperson = $insertperson.$insertpersoncont;
    $personquery= mysqli_query($conn,$insertperson);

    $person_id=null;
    if($personquery){
        $person_id=mysqli_insert_id($conn);
        echo "success";
    }else{
        echo "person error".mysqli_error($conn);
    }

    //inserting into subject table
    $insertsubject ="INSERT INTO `subjects` (`nameofsubject`,`typeofsubject`) VALUES (";
    $insertsubjectcont=" '$subjectname', '$subjecttype')";
    $insertsubject = $insertsubject.$insertsubjectcont;
    $subjectquery= mysqli_query($conn,$insertsubject);

    $subject_id=null;
    if($subjectquery){
        $subject_id=mysqli_insert_id($conn);
        echo "success";
    }

    //inserting into teachingstaff table
    $insertteachstaff = "INSERT INTO `teachingstaff`(`TeachingstaffID`,`SSN`,`Salary`) VALUES(";
    $insertteachstaffcont=" '$person_id', '$SSN', '$salary')";
    $insertteachstaff =$insertteachstaff.$insertteachstaffcont;
    $teachstaffquery = mysqli_query($conn,$insertteachstaff);

    //inserting into teachingstaffsubject table
    $insertteachstaffsubject = "INSERT INTO `teachingstaffsubject`(`TeachingstaffID`,`subjectID`) VALUES(";
    $insertteachstaffsubjectcont=" '$person_id', '$subject_id')";
    $insertteachstaffsubject =$insertteachstaffsubject.$insertteachstaffsubjectcont;
    $teachstaffsubjectquery = mysqli_query($conn,$insertteachstaffsubject);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Add New Teaching Staff</title>
</head>
<body>
    <!-- creating nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand " href="../php/index.php"><img src="../images/logo.png" width="95.3" height="71.3"></a>
            <a href="../php/teachingstaff_Info.php"><button type="button" class="btn btn-secondary">Back</button></a>
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

        <!-- form to retrieve user input -->
    <form class="row container m-auto"  action="teaching_staff_form.php" method="post">
        
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
            <input type="date" id="DOB" name="DOB" onInput="validateDate()"><br>
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

        <h6> Department </h6>
        <div class="col-6 d-flex flex-column">
            <label for="deptname">Department Name:</label>
            <select name = "deptname" id="deptname">
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
                <input type="text" id="subjectname" name="subjectname" onInput="validateSN()"><br>
                <span id="suberror"></span>
        </div>
        
        <div class="col-6 d-flex flex-column">
            <label for="subjecttype">Type of Subject:</label>
            <select name = "subjecttype" id="subjecttype">
                <option value = "choose" selected>    </option>
                <option value = "Core" name="Core">Core</option>
                <option value = "Elective" name="Elective">Elective</option>
            </select>
        </div>

        <h6>Salary </h6>
        <div class="col-6 d-flex flex-column">
                <label for="SSN">Social Security Number:</label>
                <input type="text" id="SSN" name="SSN" onInput="validateSSN()"><br>
                <span id="SSNerror"></span>
        </div>

        <div class="col-6 d-flex flex-column">
                <label for="salary">Salary:</label>
                <input type="text" id="salary" name="salary" onInput="validateS()"><br>
                <span id="salaryerror"></span>
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