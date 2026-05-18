<?php
$conn = mysqli_connect("localhost","root","","hotel");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM room WHERE RoomId='$id'");

header("Location: room_list.php");
?>