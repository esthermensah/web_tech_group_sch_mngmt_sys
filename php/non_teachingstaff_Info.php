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

    //select function to search for an item in the fees table
    function selection($theword, $conn){
        //selects from  a database based on student ID
          $theword =trim($theword);
          $sql2 = mysqli_query($conn, "SELECT concat(p.firstname, ' ', p.lastname) as 'Full Name' from `person` as p where concat(p.firstname, ' ', p.lastname) LIKE '%$theword%'");
          $searchquery=mysqli_fetch_all($sql2);
          echo mysqli_error($conn);  
          return $searchquery; 
    }

    //Delete from table 

    $deleteresult ="";
    if(isset($_POST['Delete'])){
        $theID=$_POST['ID'];
      
      $deleteresult =  delete($theID, $conn);

    }

    $theID = "";
    function delete($theID, $conn){
        // deletes from a table in the database 
          $sql2="delete from `nonteachingstaff` where `NonTeachingstaffID`='$theID'";
          $q=mysqli_query($conn,$sql2);

          echo mysqli_error($conn); 
    }

//listing function to display query function

function listing($conn){
    $nonstaff = mysqli_query($conn, "SELECT concat(P.firstname, ' ', P.lastname) as 'Full Name',P.DOB,P.gender, NTs.NonteachingstaffID,
    P.nationality, P.address, D.Headofdepartment, D.departmentName, NTs.SSN,NTs.Salary,
    case 
    when D.departmentName = 'Security'  then 'Kwesi Appiah'
    when D.departmentName = 'Dining' then 'Kofi Owusu'
    when D.departmentName = 'Manual Labour' then 'Elijah Appiah'
    when D.departmentName = 'Admissions' then 'Janet Mensah'
    else 'Select a Department'
    end as Headofdepartment
    from Person as P Inner join NonteachingStaff as NTs on P.Person_id=NTs.NonteachingstaffID
    Inner Join Department as D on D.deptnum=P.deptnum");
    $data=mysqli_fetch_all($nonstaff,MYSQLI_ASSOC);
    echo mysqli_error($conn);
    return $data;
}
 $data=listing($conn);
 
function update($theword, $dataID, $conn){
  $sql="UPDATE `person` SET 
      `Person_id`='$theword'";                       
    $sql2= " where `Person_id`='$dataID'"; 
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
    <title>Document</title>
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
    <title>Non-Teaching Staff</title>
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
                <a class="nav-link active barsbars" href="../forms/non_teaching_staff_form.php">Add new non-teaching staff</a>
              </li>
            </ul>
        </div>
        </div>
      </nav>
            <!-- creating table heads to return results of the fees query -->
      <table class="table table-striped">
        <tr>
            <th>Fullname</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Address</th>
            <th>Department Name</th>
            <th>Head of Department</th>
            <th>Social Security Number</th>
            <th>Salary</th>
        </tr>
          <!-- looping through each row of data -->

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
                <td><?php echo $q['SSN'] ?></td>
                <td><?php echo $q['Salary'] ?></td>
                <td>
                    <form action="" method="post">
                        <input class="btn btn-danger" type = "submit" name="Delete"  value="Delete"/>
                        <input type="text" name="ID" value="<?php echo $q["NonteachingstaffID"] ?>" hidden/>  
                    </form>
                </td>
                
            </tr>
        <?php } ?>

    </table>
</html>