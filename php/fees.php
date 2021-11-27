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

//select function to search for an item in the fees table
    function selection($theword, $conn){
          $theword =trim($theword);
          $sql2 = mysqli_query($conn, "SELECT concat(p.firstname, ' ', p.lastname) as 'Full Name' from `person` as p where concat(p.firstname, ' ', p.lastname) LIKE '%$theword%'");
          $searchquery=mysqli_fetch_all($sql2);
          echo mysqli_error($conn);  
          return $searchquery; 
    }

//listing function to display query function
$data = null;
function listing($conn){
    $fees = mysqli_query($conn, "SELECT concat(P.firstname, ' ', P.lastname) as 'Full Name', P.gender, P.nationality, P.address, f.AccNum, 
    f.installment, f.AmountPaid, FP.totalamount,
    if (FP.totalamount>f.Amountpaid, concat('Amount owed is ',FP.totalamount-f.Amountpaid),concat('Amount in excess is ',f.Amountpaid-FP.totalamount)) as 'Fees Status'
    from Fees as f Inner Join FeesPayment as FP on f.feesID=FP.AccID
    Inner Join Students as S on S.SID=FP.SID
    Inner Join Person as P on P.Person_id=S.SID");
    $data=mysqli_fetch_all($fees,MYSQLI_ASSOC);
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
    <title>GADE CENTRAL SCHOOL</title>
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
      <!-- creating table heads to return results of the fees query -->
      <table class="table table-striped">
        <tr>
            <th>Fullname</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Address</th>
            <th>Account Number</th>
            <th>Installment</th>
            <th>AmountPaid</th>
            <th>Fees Status</th>
        </tr>
        <!-- looping through each row of data -->
        <?php foreach($data as $q) { ?> 
            <tr>
                <?php if (in_array($q['Full Name'],$searchresult)) { ?>
                    <td class="highlight"><?php echo $q['Full Name'] ?></td>
                <?php } else { ?>
                    <td><?php echo $q['Full Name'] ?></td>
                <?php } ?>
                <td><?php echo $q['gender'] ?></td>
                <td><?php echo $q['nationality'] ?></td>
                <td><?php echo $q['address'] ?></td>
                <td><?php echo $q['AccNum'] ?></td>
                <td><?php echo $q['installment'] ?></td>
                <td><?php echo $q['AmountPaid'] ?></td>
                <td><?php echo $q['Fees Status'] ?></td>
            </tr>
        <?php } ?>

    </table>
</body>
</html>