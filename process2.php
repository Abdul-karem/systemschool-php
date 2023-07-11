<!-- simple connect in index 2 -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sestem-school";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>