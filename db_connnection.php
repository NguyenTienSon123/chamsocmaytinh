<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "chamsocmaytinh";



// Create connection
$conn = new mysqli($server, $user, $pass, $database);

// Check connection

if ($conn) {
    mysqli_query( $conn, "SET NAMES 'utf8' ");
}else{
    echo "Kết nối thất bại";
}
?>