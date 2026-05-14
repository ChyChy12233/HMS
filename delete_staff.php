<?php
$conn = mysqli_connect("localhost","root","","hotel");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM staff WHERE StaffId='$id'");

header("Location: staff_list.php");
?>