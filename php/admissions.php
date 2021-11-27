<?php
require __DIR__ ."/database_connection_test.php";

// $data = null;
// $ID= "";
// if (isset($_POST["Edit"])){
//     $userSearch=$_POST["search_term"];

//    $ID=$_POST["ID"];
// }

$deleteresult ="";
    if(isset($_POST['Delete'])){
        $theID=$_POST['ID'];
        echo $theID;
      $deleteresult =  delete($theID, $conn);

    }
 
    $theID = "";
    function delete($theID, $conn){
        // deletes from a table in the database 
          $sql2="delete from `potentialstudents` where `PS_ID`='$theID'";
          $q=mysqli_query($conn,$sql2);

          echo mysqli_error($conn); 
    }

//listing function to display query function
function listing($conn){
    $admissions = mysqli_query($conn, "SELECT concat(ps.firstname, ' ', ps.lastname) as 'Full Name', ps.PS_ID,
    ps.DOB, ps.gender, ps.nationality, ps.address, ps.PrevSchool, ps.RawScore, ps.ParentName, ps.ParentNumber, ps.ParentAddress, 
    if (ps.Rawscore>380, 'Accepted', 'Rejected') AS 'Admission Status' 
    from PotentialStudents as ps cross Join ApplicationInfo as AppInfo
    on ps.PS_ID=AppInfo.PS_ID ORDER BY firstname asc;");
    $data=mysqli_fetch_all($admissions,MYSQLI_ASSOC);
    echo mysqli_error($conn);
    return $data;
}
$data = listing($conn);

$searchresult = [];
       if(isset($_GET['searchbar'])){ 
        $input = $_GET['searchbar'] ;
        $searchresult = array_map("reduceArray", selection($input, $conn));
      } 

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


  
?>


 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Admissions</title>
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
                    <a class="nav-link active barsbars" href="registration.php">Course Registration</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active barsbars" href="../forms/potential_student_form.php">Admit New Student</a>
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
            <th>Previous School</th>
            <th>Raw Score</th>
            <th>Parent Name</th>
            <th>Parent Number</th>
            <th>Parent Address</th>
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
                <td><?php echo $q['PrevSchool'] ?></td>
                <td><?php echo $q['RawScore'] ?></td>
                <td><?php echo $q['ParentName'] ?></td>
                <td><?php echo $q['ParentNumber'] ?></td>
                <td><?php echo $q['ParentAddress'] ?></td>
                <td>
                    <form action="" method="post">
                        <input class="btn btn-danger" type = "submit" name="Delete"  value="Delete"/>
                        <input type="text" name="ID" value="<?php echo $q["PS_ID"] ?>" hidden/>  
                    </form>
                </td>
            </tr>
        <?php } ?>

    </table>
    
</body>
</html>


