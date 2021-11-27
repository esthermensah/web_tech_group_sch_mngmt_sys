<?php  
require __DIR__ ."/database_credentials.php";

    
    $conn = new mysqli(servername,username,password,dbname);
    
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
        echo "Connection failed";
    }
  

?>