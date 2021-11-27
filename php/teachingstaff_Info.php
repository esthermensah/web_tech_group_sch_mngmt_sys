<?php

require __DIR__ ."/database_connection_test.php";
$data=null;
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

    $deleteresult ="";
    if(isset($_POST['Delete'])){
      $theID=$_POST['ID'];
       $deleteresult =  delete($theID, $conn);

    }

    $theID = "";
    function delete($theID, $conn){
        // deletes from a table in the database 
          $sql2="delete from `teachingstaff` where `TeachingstaffID`='$theID'";
          $q=mysqli_query($conn,$sql2);
          echo mysqli_error($conn); 
    }
  //function to display the teaching staff info
function listing($conn){
    $staff = mysqli_query($conn, "SELECT concat(P.firstname, ' ', P.lastname) as 'Full Name', Ts.TeachingstaffID, P.DOB, P.gender, P.nationality, P.address, 
    D.Headofdepartment, D.departmentName, Sub.nameofsubject, Sub.typeofsubject, Ts.SSN,Ts.Salary,
    case 
    when D.departmentName = 'Science'  then 'Kofi Twumasi'
    when D.departmentName = 'Maths' then 'Eunice Oppong'
    when D.departmentName = 'English' then 'Sarah Cudjoe'
    when D.departmentName = 'Arts' then 'George Ampofo'
    when D.departmentName = 'Business' then 'Kofi Appiah'
    else 'Select a Department'
    end as Headofdepartment
    from Person as P Inner join TeachingStaff as Ts on P.Person_id=Ts.TeachingstaffID
    Inner Join Department as D on D.deptnum=P.deptnum
    Inner Join TeachingstaffSubject as Tss on Ts.TeachingstaffID=Tss.TeachingstaffID
    Inner Join Subjects as Sub on Tss.subjectID=Sub.subjectID");
    $data=mysqli_fetch_all($staff,MYSQLI_ASSOC);
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
    <title>Teaching Staff</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Teaching Staff</title>
</head>
<body>
    <!-- form to get teaching staff info input -->
<div class="popup">
  <form id="popup-form" class="row container m-auto form-background popup-form"  action="teachingstaff_Info.php" method="post">
     
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

        <h6>Salary </h6>
        <div class="col-6 d-flex flex-column">
                <label for="SSN">Social Security Number:</label>
                <input type="text" id="SSN" name="SSN"><br>
        </div>

        <div class="col-6 d-flex flex-column">
                <label for="salary">Salary:</label>
                <input type="text" id="salary" name="salary"><br>
        </div>

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
                <a class="nav-link active barsbars" href="#">Calendar</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active barsbars" href="#">Help</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active barsbars" href="../forms/teaching_staff_form.php">Add New Teaching Staff</a>
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
            <th>Name of Subject</th>
            <th>Subject Type</th>
            <th>Social Security Number</th>
            <th>Salary</th>
        </tr>
<!-- looping through rows to retrieve the teaching staff info-->
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
                <td><?php echo $q['nameofsubject'] ?></td>
                <td><?php echo $q['typeofsubject'] ?></td>
                <td><?php echo $q['SSN'] ?></td>
                <td><?php echo $q['Salary'] ?></td>
                <td>
                    <form action="" method="post" class="form-submit" onSubmit="onEdit(event)">
                        <input class="btn edit-color" type = "submit" name="Edit"  value="Edit"/>
                        <input type="text" name="ID" value="<?php echo $q["TeachingstaffID"] ?>" hidden/>  
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input class="btn btn-danger" type = "submit" name="Delete"  value="Delete"/>
                        <input type="text" name="ID" value="<?php echo $q["TeachingstaffID"] ?>" hidden/>  
                    </form>
                </td>
                
            </tr>
        <?php } ?>

    </table>
    <script src="../javascript/stuinfo.js"></script>
  </body>
</html>