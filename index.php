<?php
 $email  = $_POST['email'];
 $password = $_POST['password'];

 // Database connection here
 $conn = new mysqli("localhost","id19147132_root","OSX0THq_^U?@1#^R","id19147132_usersignup");
 if($conn->connect_error) {
     die("Failed to connect : ".$conn->connect_error);
 } else {
     $stmt = $conn->prepare("SELECT * FROM usersignup WHERE email = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt_result = $stmt->get_result();
     if($stmt_result->num_rows > 0) {
          $data = $stmt_result->fetch_assoc();
          if($data['password'] ===$password) {
              header("Location:userhome.html");
          } else {
              echo "<h2>Invalid Email or Password</h2>";
          }
     } else {
         echo "<h2> Invalid Email or Password</h2>";
     }
 }

?>