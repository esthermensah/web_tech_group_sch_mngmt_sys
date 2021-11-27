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
//function to search for a person's name
    function selection($theword, $conn){
        //selects from  a database based on student ID
          $theword =trim($theword);
          $sql2 = mysqli_query($conn, "SELECT concat(p.firstname, ' ', p.lastname) as 'Student Names' from `person` as p where concat(p.firstname, ' ', p.lastname) LIKE '%$theword%'");
          $searchquery=mysqli_fetch_all($sql2);
          echo mysqli_error($conn);  
          return $searchquery; 
    }

//function to display results of the students
function listing($conn){
    $results = mysqli_query($conn, "SELECT concat(P.firstname,' ',P.lastname) as 'Student Names',Sub.nameofsubject,Sub.typeofsubject,R.score,s.class,s.yeargroup,
    case
    when R.score >= 80 then 'A1'
    when R.score >=75 then 'B2'
    when R.score >=70 then 'B3'
    when R.score >=65 then 'C4'
    when R.score >=60 then 'C5'
    when R.score >=55 then 'C6'
    when R.score >=50 then 'D7'
    when R.score >=45 then 'E8'
    when R.score <=45 then 'F9'
    end as Grade
    from Students as s 
    Inner Join  studentSubject as Ss on s.SID=Ss.SID
    Inner Join  Person as P on P.Person_id=s.SID
    Inner Join  StudentSubjectResults as SR on SR.subjectId=Ss.subjectId
    Inner Join  Results as R on R.Resultnum=SR.Resultnum
    Inner Join  Subjects as Sub on Sub.subjectID=Ss.subjectID
    Order by P.firstname asc");
    $data=mysqli_fetch_all($results,MYSQLI_ASSOC);
    echo mysqli_error($conn);
    return $data;
}
$data = listing($conn);

function update($theword, $dataID, $conn){
  $sql="UPDATE `results` SET 
      `Search_term`='$theword'";                       
    $sql2= " where `Resultnum`='$dataID'"; 
       $sql=$sql.$sql2;    
    $q=mysqli_query($conn, $sql);
}


function delete($dataID, $conn){
  $sql2="delete from `results` where `Resultnum`='$dataID'";
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
    <title>GADE CENTRAL SCHOOL</title>
</head>
<body>
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
      <!-- creating table headings  -->
      <table class="table table-striped">
      <tr>
            <th>Student Names</th>
            <th>Name of Subject</th>
            <th>Type of Subject</th>
            <th>Score</th>
            <th>Class</th>
            <th>Year group</th>
            <th>Grade </th>
        </tr>
<!-- looping through rows to retrieve the results of students -->
        <?php foreach($data as $q) { ?> 
            <tr>
                <?php if (in_array($q['Student Names'],$searchresult)) { ?>
                    <td class="highlight"><?php echo $q['Student Names'] ?></td>
                <?php } else { ?>
                    <td><?php echo $q['Student Names'] ?></td>
                <?php } ?>
                <td><?php echo $q['nameofsubject'] ?></td>
                <td><?php echo $q['typeofsubject'] ?></td>
                <td><?php echo $q['score'] ?></td>
                <td><?php echo $q['class'] ?></td>
                <td><?php echo $q['yeargroup'] ?></td>
                <td><?php echo $q['Grade'] ?></td>
            </tr>
        <?php } ?>
    </table>
</html>