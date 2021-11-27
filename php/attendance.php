<?php

require __DIR__ ."/database_connection_test.php";
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

    
    function selection($theword, $conn){
        //selects from  a database based on student ID
          $theword =trim($theword);
          $sql2 = mysqli_query($conn, "SELECT concat(p.firstname, ' ', p.lastname) as 'Full Name' from `person` as p where concat(p.firstname, ' ', p.lastname) LIKE '%$theword%'");
          $searchquery=mysqli_fetch_all($sql2);
          echo mysqli_error($conn);  
          return $searchquery; 
    }

    //listing function to display query function
      $data = null;
      
      function listing($conn){
          $attendance = mysqli_query($conn, "SELECT s.SID, s.class, concat(p.firstname,' ',p.lastname) as 'Full Name', A.PresentNo, A.Months,s.yeargroup,
          if(A.presentNo<15,'Student has not been attending classes often','Student has good attendace in class') AS 'Attendance Status'
          from Students as s Inner Join Attendance as A
          on s.SID=A.SID 
          Inner Join Person as P
          on P.Person_id=s.SID");
          $data=mysqli_fetch_all($attendance,MYSQLI_ASSOC);
          echo mysqli_error($conn);
          return $data;
      }
      $data = listing($conn);

      function update($theword, $dataID, $conn){
        $sql="UPDATE `attendance` SET 
            `SID`='$theword'";                       
          $sql2= " where `SID`='$dataID'"; 
            $sql=$sql.$sql2;    
          $q=mysqli_query($conn, $sql);
      }




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

<!-- creating the navbar -->

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
                <a class="nav-link active barsbars" href="../forms/student_form.php">New Entry</a>
              </li>
            </ul>
        </div>
        </div>
      </nav>
      <!-- Defining table headers -->

      <table class="table table-striped">
        <tr>
            <th>Fullname</th>
            <th>Number of Times Present</th>
            <th>Months</th>
            <th>Year group</th>
            <th>Attendance Status</th>
        </tr>

<!-- looping through rows to retrieve the attendance info of students -->


        <?php foreach($data as $q) { ?> 
            <tr>
                <?php if (in_array($q['Full Name'],$searchresult)) { ?>
                    <td class="highlight"><?php echo $q['Full Name'] ?></td>
                <?php } else { ?>
                    <td><?php echo $q['Full Name'] ?></td>
                <?php } ?>
                <td><?php echo $q['PresentNo'] ?></td>
                <td><?php echo $q['Months'] ?></td>
                <td><?php echo $q['yeargroup'] ?></td>
                <td><?php echo $q['Attendance Status'] ?></td>
            </tr>
        <?php } ?>
    </table>
</html>