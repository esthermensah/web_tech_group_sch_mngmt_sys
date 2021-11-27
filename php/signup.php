<?php
	require __DIR__ ."/database_credentials.php";

	$error = "";

    if(isset($_POST["btnSubmit"])) {
		$conn = new mysqli(servername,username,password,dbname);
    
		if($conn->connect_error){
			die("Connection failed: ".$conn->connect_error);
			echo "Connection failed";
		}
		else {
			$Email = $_POST['Email'];
			$stmt = $conn -> prepare("SELECT * FROM signupinfo WHERE Email = ? LIMIT 1");
			$stmt -> bind_param("s",$Email);
			$stmt -> execute();
			$result = $stmt -> get_result();
			if($result -> fetch_assoc()) {
				$error = "An account with this email already exists. Login instead?";
			} else {
				$stmt = $conn -> prepare("insert into signupinfo(FirstName,LastName,Email,Password)values(?,?,?,?)");
				$stmt -> bind_param("ssss",$FirstName,$LastName,$Email,$Password);

				$FirstName = $_POST['FirstName'];
				$LastName = $_POST['LastName'];
				$Password = $_POST['Password'];

				$stmt -> execute();
				
				if ($conn->error) {
				    $stmt ->close();
				    $conn -> close();
				} else {
				    header("Location: login.php");
				}
			}
		}	
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/styles.css"> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="../css/signup.css">

</head>

<body>
<div class="signup-form">
    <form action="signup.php" method="POST" id="signup_form">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="FirstName" placeholder="First Name" required="required"> </div>
				<div class="col"><input type="text" class="form-control" name="LastName" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="Email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="Password" placeholder="Password" id="password1" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" id="password2" required="required">
        </div>
		<div class="form-group">
            <button name="btnSubmit" type="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
		<?php if($error) { ?>
			<p class="error-text"><?php echo $error; ?></p>
		<?php } ?>
    </form>
	<div class="hint-text">Already have an account? <a href="login.php">Login here</a></div>
</div>

<script src= "../javascript/passwordvalidation.js"></script>
<script src= "../javascript/validation_signup.js"></script>
</body>
</html>