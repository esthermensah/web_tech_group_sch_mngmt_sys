<?php
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
  <!-- code for navbar design -->
    <nav class="navbar navbar-expand-lg navbar-dark navbarcolor">
        <div class="container-fluid">
          <a class="navbar-brand " href="index.php"><img src="../images/logo.png" width="95.3" height="71.3"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 bars" >
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
                <a class="nav-link active barsbars" href="../forms/potential_student_form.php">Admit Student</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active barsbars" href="login.php">Logout</a>
              </li>
            </ul>
        </div>
        </div>
      </nav>

<!-- designing home page interface (circles) -->
<div class= "main-home">
   
    <a href="index.php"><div class = "center_circle shadow-lg"></div></a>

    <a href="admissions.php"><div class="small_circle sc_adm shadow-lg"> </div></a>
    <a href="results.php"><div class="small_circle sc_res shadow-lg"></div></a>
    <a href="registration.php"><div class="small_circle sc_reg shadow-lg"></div></a>
    <a href="community.php"><div class="small_circle sc_comm shadow-lg"></div></a>
    <a href="boarding.php"><div class="small_circle sc_board shadow-lg"></div></a>


</div>

<!-- footer design -->
    <div class="foot_color">
        <footer class="py-3 mt-4">
          
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Email</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Info</a></li>                 
          </ul><p class="text-center text-muted">© 2021 Team GADE, Inc</p>
        </footer>
      </div>

</body>
</html>
