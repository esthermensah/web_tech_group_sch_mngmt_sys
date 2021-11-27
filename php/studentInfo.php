<?php
require __DIR__ ."/database_connection_test.php";
$data=null;
$ID= "";
//checking if user has made a search
$searchresult = [];
       if(isset($_GET['searchbar'])){ 
        $input = $_GET['searchbar'] ;
        $searchresult = array_map("reduceArray", selection($input, $conn));
      } 
//function to reduce array to a single array
    function reduceArray($array) {
        return $array[0];
    }
    //function to search for a person
    function selection($theword, $conn){
        //selects from  a database based on student ID
          $theword =trim($theword);
          $sql2 = mysqli_query($conn, "SELECT concat(p.firstname, ' ', p.lastname) as 'Full Name' from `person` as p where concat(p.firstname, ' ', p.lastname) LIKE '%$theword%'");
          $searchquery=mysqli_fetch_all($sql2);
          echo mysqli_error($conn);  
          return $searchquery; 
    }

    //function to delete a student from the database
    $deleteresult ="";
    if(isset($_POST['Delete'])){
        $theID=$_POST['ID'];
        echo $theID;
      $deleteresult =  delete($theID, $conn);

    }
 
    $theID = "";
    function delete($theID, $conn){
        // deletes from a table in the database 
          $sql2="delete from `students` where `SID`='$theID'";
          $q=mysqli_query($conn,$sql2);
          echo mysqli_error($conn); 
    }

    if(isset($_POST["Okaybutton"])) {
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
        $accountID=$_POST['AccID'];
        $courseID=$_POST['Course_id'];
        $studentID=$_POST['SID'];
        $deptnum=$_POST['deptnum'];
        $feesID=$_POST['feesID'];
        $houseID=$_POST['houseID'];
        $subjectID=$_POST['subjectID'];
        $resultnum=$_POST['Resultnum'];
        $subjectname=$_POST['subjectname'];
        $subjecttype=$_POST['subjecttype'];
        $passgrade=$_POST['passgrade'];

        $updatedept = "UPDATE `department` set `departmentName`= '$department' where `deptnum`=$deptnum";
        $stuinfoupdate = mysqli_query($conn,$updatedept);

        $updateperson = "UPDATE `person` set `deptnum`= '$deptnum', `firstname` = '$firstname', `lastname` = '$lastname', `gender` = '$gender',`DOB` = '$DOB',`nationality` = '$nationality',`address` = '$address' 
        where `person_id`= $studentID" ;
        $stuinfoupdate = mysqli_query($conn,$updateperson);

        $updatebhouse = "UPDATE `boardinghouse` set `HouseName`= '$bhouse', `roomnumber` = '$roomnumber', `HouseCapacity` = '$capacity', `Numberofrooms` = '$noofrooms',`RoomCapacity` = '$roomcapacity'
        where `houseID`=$houseID" ;
        $stuinfoupdate = mysqli_query($conn,$updatebhouse);

        $updateaccount = "UPDATE `Fees` set `AccNum`= '$account', `installment` = '$installment', `AmountPaid` = '$amountpaid'
        where `feesID`=$feesID";
        $stuinfoupdate = mysqli_query($conn,$updateaccount);

        $updatecourse = "UPDATE `courses` set `CourseName`= '$coursename', `Courserequirement` = '$courserequirement'
        where `Course_id`=$courseID" ;
        $stuinfoupdate = mysqli_query($conn,$updatecourse);

        $updateresults = "UPDATE `results` set `score`= '$score'
        where `Resultnum`=$resultnum" ;
        $stuinfoupdate = mysqli_query($conn,$updateresults);

        $updatesubject = "UPDATE `subjects` set `nameofsubject`= '$subjectname', `typeofsubject` = '$subjecttype'
        where `subjectID`=$subjectID" ;
        $stuinfoupdate = mysqli_query($conn,$updatesubject);

        $updatestuinfo = "UPDATE `students` set `HouseNo`= '$houseID', `SID` = '$studentID',`CourseID` = '$courseID',`class` = '$class',`yeargroup` = '$yeargroup',`club` = '$club'
        where `SID`=$studentID" ;
        $stuinfoupdate = mysqli_query($conn,$updatestuinfo);

        $updatestudentsubject = "UPDATE `studentsubject` set `SID`= '$studentID', `subjectID` = '$subjectID'
        where `SID`=$studentID" ;
        $stuinfoupdate = mysqli_query($conn,$updatestudentsubject);

        $updatestusubresults = "UPDATE `studentsubjectresults` set `HouseNo`= '$houseID', `SID` = '$studentID',`CourseID` = '$courseID',`class` = '$class',`yeargroup` = '$yeargroup',`club` = '$club'
        where `subjectID`=$subjectID" ;
        $stuinfoupdate = mysqli_query($conn,$updatestusubresults);

        $updatefeespayment = "UPDATE `feespayment` set `SID`= '$studentID', `AccID` = '$accountID', `academicyear` = '$academicyear', `totalamount` = '$tuition'
        where `AccID`=$accountID" ;
        $stuinfoupdate = mysqli_query($conn,$updatefeespayment);

        $updateattendance = "UPDATE `attendance` set `SID`= '$studentID', `PresentNo` = '$presentno', `Months` = '$month'
        where `SID`=$studentID" ;
        $stuinfoupdate = mysqli_query($conn,$updateattendance);

    }

//function to display studentInfo
 function listing($conn){
    $stuinfo = mysqli_query($conn, "SELECT concat(P.firstname, ' ', P.lastname) as 'Full Name',S.SID, P.DOB, P.gender, P.nationality, P.address, 
    D.departmentName, D.Headofdepartment, C.CourseName, Bhouse.housename,
    case 
    when D.departmentName = 'Science'  then 'Kofi Twumasi'
    when D.departmentName = 'Maths' then 'Eunice Oppong'
    when D.departmentName = 'English' then 'Sarah Cudjoe'
    when D.departmentName = 'Arts' then 'George Ampofo'
    when D.departmentName = 'Business' then 'Kofi Appiah'
    else 'Select a Department'
    end as Headofdepartment
    from Person as P Inner Join Students as S on P.Person_id=S.SID
    Inner Join Department as D on D.deptnum=P.deptnum
    Inner Join Courses as C on C.Course_id=S.CourseID
    Inner Join BoardingHouse as Bhouse on Bhouse.houseID=S.HouseNo
    Order by P.lastname asc");
    $data=mysqli_fetch_all($stuinfo,MYSQLI_ASSOC);
    echo mysqli_error($conn);
    return $data;
}
 $data=(listing($conn));


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>GADE CENTRAL SCHOOL</title>
</head>
<body>
  <div class="popup">
  <form id="popup-form" class="row container m-auto form-background popup-form"  action="studentInfo.php" method="post">
     
     <h6> Personal Information </h6>
     <div class="col-6 d-flex flex-column">
         <label for="fname">First name:</label>
         <input type="text" id="fname" name="fname">
     </div>
       
     <div class="col-6 d-flex flex-column">
         <label for="lname">Last name:</label>
         <input type="text" id="lname" name="lname">
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
         <input type="text" id="DOB" name="DOB"><br>
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="nationality">Nationality</label>
         <input type="text" id="nationality" name="nationality">
     </div>
 
     <div class="col-6 d-flex flex-column">
             <label for="address">Address:</label>
             <input type="text" id="address" name="address"><br>
     </div>   
 
     <h6>School Info</h6>
     <div class="col-6 d-flex flex-column">
         <label for="class">Class:</label>
         <input type="text" id="class" name="class"><br>
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="yeargroup">Year Group:</label>
         <input type="text" id="yeargroup" name="yeargroup"><br>
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
         <input type="text" id="courserequirement" name="courserequirement"><br>
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
             <input type="text" id="subjectname" name="subjectname"><br>
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
         <input type="text" id="present_no" name="present_no"><br>
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
         <input type="text" id="club" name="club"><br>
     </div>
 
     <h6> Fees </h6>
     <div class="col-6 d-flex flex-column">
         <label for="accountnumber">Account Number:</label>
         <input type="text" id="accountnumber" name="accountnumber">
     </div>
     
     <div class="col-6 d-flex flex-column">
         <label for="totalamount">Tuition Fee:</label>
         <input type="text" id="totalamount" name="totalamount"><br>
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="installment">Installment: </label>
         <input type="text" id="installment" name="installment">
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="amountpaid">Amount Paid:</label>
         <input type="text" id="amountpaid" name="amountpaid"><br>
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="academicyear">Academic Year:</label>
         <input type="text" id="academicyear" name="academicyear"><br>
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
         <input type="text" id="roomnumber" name="roomnumber"><br>
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="housecapacity">House Capacity:</label>
         <input type="text" id="housecapacity" name="housecapacity"><br>
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="no_of_rooms">No of Rooms:</label>
         <input type="text" id="no_of_rooms" name="no_of_rooms"><br>
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="room_capacity">Room Capacity:</label>
         <input type="text" id="room_capacity" name="room_capacity"><br>
     </div>
 
     <h6>Result Info </h6>
     <div class="col-6 d-flex flex-column">
         <label for="score">Score:</label>
         <input type="text" id="score" name="score"><br>
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="passgrade">Pass Grade:</label>
         <input type="text" id="passgrade" name="passgrade"><br>
     </div>

     <input type="hidden" name="AccID">
     <input type="hidden" name="Course_id">
     <input type="hidden" name="SID">
     <input type="hidden" name="deptnum">
     <input type="hidden" name="feesID">
     <input type="hidden" name="houseID">
     <input type="hidden" name="subjectID">
     <input type="hidden" name="Resultnum">
 
 
 
     <center>
     <div class=" col-2 d-flex">
         <input class="btn edit-color me-2" type="submit"  name="Okaybutton" value="Okay">
         <button class="ms-2 btn btn-danger" onClick="closePopup(event)">Cancel</button>
     </div>
     </center>
 
     </form>

  </div>
  <!-- navbar design -->
  <nav class="navbar navbar-expand-lg navbar-dark navbarcolor">
        <div class="container-fluid">
          <a class="navbar-brand " href="index.php"><img src="../images/logo.png" width="95.3" height="71.3"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 bars" >
              <form action="" method="get">
                  <li>          
                      <input type="text" name= "searchbar"  placeholder="Search..">           
                  </li>
              </form>
              <li class="nav-item">
                <a class="nav-link active barsbars" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active barsbars" href="fees.php">Fees</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active barsbars" href="boarding.php">Boarding Info</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active barsbars" href="attendance.php">Student Attendance</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active barsbars" href="../forms/student_form.php">New Entry</a>
              </li>
            </ul>
        </div>
        </div>
      </nav>
      <!-- creating table headings  -->
      <table class="table table-striped">
      <tr>
            <th>Fullname</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Address</th>
            <th>Department Name</th>
            <th>Head of Department</th>
            <th>Course</th>
            <th>House Name</th>
        </tr>

<!-- looping through rows to retrieve the boarding house info of students -->
        <?php foreach($data as $q) { ?> 
            <tr>
                <?php if (in_array($q['Full Name'],$searchresult)) { ?>
                    <td class="highlight"><?php echo $q['Full Name'] ?></td>
                <?php } else { ?>
                    <td><?php echo $q['Full Name'] ?></td>
                <?php } ?>
                <td><?php echo $q['DOB'] ?></td>
                <td><?php echo $q['gender'] ?></td>
                <td><?php echo $q['nationality'] ?></td>
                <td><?php echo $q['address'] ?></td>
                <td><?php echo $q['departmentName'] ?></td>
                <td><?php echo $q['Headofdepartment'] ?></td>
                <td><?php echo $q['CourseName'] ?></td>
                <td><?php echo $q['housename'] ?></td>
                <td>
                    <form action="" method="post" class="form-submit" onSubmit="onEdit(event)">
                        <input class="btn edit-color" type = "submit" name="Edit"  value="Edit"/>
                        <input type="text" name="ID" value="<?php echo $q["SID"] ?>" hidden/>  
                    </form>
                </td>
                <td>
                    <form action="" method="post" onSubmit="onDelete(event)">
                        <input class="btn btn-danger" type = "submit" name="Delete"  value="Delete"/>
                        <input type="text" name="ID" value="<?php echo $q["SID"] ?>" hidden/>  
                    </form>
                </td>
            </tr>
        <?php } ?>

    </table>
    <script src="../javascript/stuinfo.js"></script>
 </body>
</html>