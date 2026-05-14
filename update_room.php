<?php
$conn = mysqli_connect("localhost","root","","hotel");

$id = $_POST['RoomId'];

$sql = "UPDATE room SET 
RoomNumber='{$_POST['RoomNumber']}',
RoomTypeId='{$_POST['RoomTypeId']}',
RoomStatus='{$_POST['RoomStatus']}',
Note='{$_POST['Note']}'
WHERE RoomId='$id'";

mysqli_query($conn, $sql);

header("Location: room_list.php");
?>