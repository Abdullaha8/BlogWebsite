<?php 
$database = "blog_site";
$username = "root";
$password = "0710";
$hostname = "localhost";
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>