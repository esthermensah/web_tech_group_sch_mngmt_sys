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
//function to search for a person
    function selection($theword, $conn){
          $theword =trim($theword);
          $sql2 = mysqli_query($conn, "SELECT concat(p.firstname, ' ', p.lastname) as 'Full Name' from `person` as p where concat(p.firstname, ' ', p.lastname) LIKE '%$theword%'");
          $searchquery=mysqli_fetch_all($sql2);
          echo mysqli_error($conn);  
          return $searchquery; 
    }
//function to display boarding info of the students
$data = null;
function listing($conn){
    $boarding = mysqli_query($conn, "SELECT concat(P.firstname, ' ', P.lastname) as 'Full Name', Bhouse.housename, Bhouse.roomnumber,
    Bhouse.housecapacity, bhouse.numberofrooms, bhouse.roomcapacity,
    case 
    when Bhouse.housename = 'peter_aladjetey' or Bhouse.housename='Peter Aladjetey' then 'Kwame Movado'
    when Bhouse.housename = 'halm_addo' or Bhouse.housename = 'Halm Addo' then 'Kofi Yesu'
    when Bhouse.housename = 'alema' then 'Gideon Gidiman'
    when Bhouse.housename = 'ellen' then 'Kwame Boakye'
    when Bhouse.housename = 'nanaoteng' or Bhouse.housename = 'Nana Oteng' then 'Kofi Larbi'
    else 'Student is not in a Boarding House'
    end as HouseMaster
    from students as s Right Join boardinghouse as Bhouse on s.HouseNo=Bhouse.houseID
    Inner Join person as P on P.Person_id=s.SID");
    $data=mysqli_fetch_all($boarding,MYSQLI_ASSOC);
    echo mysqli_error($conn);
    return $data;
}

 $data = listing($conn);

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Boarding</title>
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
            <th>House Name</th>
            <th>Room Number</th>
            <th>House Capacity</th>
            <th>Number of rooms</th>
            <th>Room Capacity</th>
            <th>House Master</th>
        </tr>
<!-- looping through rows to retrieve the boarding house info of students -->
        <?php foreach($data as $q) { ?> 
            <tr>
                <?php if (in_array($q['Full Name'],$searchresult)) { ?>
                    <td class="highlight"><?php echo $q['Full Name'] ?></td>
                <?php } else { ?>
                    <td><?php echo $q['Full Name'] ?></td>
                <?php } ?>
                <td><?php echo $q['housename'] ?></td>
                <td><?php echo $q['roomnumber'] ?></td>
                <td><?php echo $q['housecapacity'] ?></td>
                <td><?php echo $q['numberofrooms'] ?></td>
                <td><?php echo $q['roomcapacity'] ?></td>
                <td><?php echo $q['HouseMaster'] ?></td>
            </tr>
        <?php } ?>

    </table>
</body>
</html>