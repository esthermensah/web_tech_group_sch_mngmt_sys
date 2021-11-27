<?php
require __DIR__ ."/database_connection_test.php";
$data = null;
$ID= "";
if (isset($_POST["Edit"])){
    $userSearch=$_POST["search_term"];

   $ID=$_POST["ID"];
}
//checking if user has made a search

if (isset($_POST["update"])){
  $userSearch=$_POST["theInput"];
  $theID=$_POST["theID"];
 update_content($userSearch, $ID, $conn);
 header("Location: my_form.php"); 
}

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
          $sql2 = mysqli_query($conn, "SELECT concat(ps.firstname, ' ', ps.lastname) as 'Full Name' from `potentialstudents` as ps where concat(ps.firstname, ' ', ps.lastname) LIKE '%$theword%'");
          $searchquery=mysqli_fetch_all($sql2);
          echo mysqli_error($conn);  
          return $searchquery; 
    }
//listing function to display query function

function listing($conn){
    $registration = mysqli_query($conn, "SELECT concat(PS.firstname,' ',PS.lastname) as 'Full Name', C.CourseName, C.Courserequirement, PS.RawScore,
    if (PS.RawScore<C.Courserequirement, concat('You do not qualify for ', C.CourseName), concat('You are qualified to take ', C.CourseName)) as 'Course Registration'
    from PotentialStudents as PS 
    Inner Join ApplicationInfo as AppInfo on PS.PS_ID=AppInfo.PS_ID
    Inner Join Courses as C on C.Course_id=AppInfo.CourseID");
    $data=mysqli_fetch_all($registration,MYSQLI_ASSOC);
    echo mysqli_error($conn);
    return $data;
}
$data = listing($conn);


function update($theword, $dataID, $conn){
    $sql="UPDATE `person` SET 
        `Person_id`='$theword'";                       
      $sql2= " where `Person_id`='$dataID'"; 
         $sql=$sql.$sql2;    
      $q=mysqli_query($conn, $sql);
  }
  
  
  function delete($dataID, $conn){
    $sql2="delete from `person` where `Person_id`='$dataID'";
    $q=mysqli_query($conn,$sql2);
    
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
    <title>Course Registration</title>
</head>
<body>
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
                <a class="nav-link active barsbars" href="admissions.php">Admissions</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active barsbars" href="../forms/student_form.php">New Entry</a>
              </li>
            </ul>
        </div>
        </div>
      </nav>
      <!-- creating table heads to return results of the fees query -->

<table class="table table-striped.">
        <tr>
            <th>Fullname</th>
            <th>Course Name</th>
            <th>Course Requirement</th>
            <th>RawScore</th>
            <th>Course Registration</th>
           
        </tr>
        <!-- looping through each row of data -->


        <?php foreach($data as $q) { ?> 
            <tr>
                <?php if (in_array($q['Full Name'],$searchresult)) { ?>
                    <td class="highlight"><?php echo $q['Full Name'] ?></td>
                <?php } else { ?>
                    <td><?php echo $q['Full Name'] ?></td>
                <?php } ?>
                <td><?php echo $q['CourseName'] ?></td>
                <td><?php echo $q['Courserequirement'] ?></td>
                <td><?php echo $q['RawScore'] ?></td>
                <td><?php echo $q['Course Registration'] ?></td>
            
            </tr>
        <?php } ?>

    </table>
</body>
</html>