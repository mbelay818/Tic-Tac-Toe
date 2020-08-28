<?php

$servername = "localhost";
$username = "mmerid2";
$password = "mmerid2";
$db = "mmerid2";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE user (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        password varchar(255) NOT NULL)" ;

      
if (mysqli_query($conn, $sql)) {
} else {
 
}
      
mysqli_close($conn);
      
?>
