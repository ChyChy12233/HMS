<?php
$conn = mysqli_connect("localhost","root","","hotel");

$roomNumber = $_POST['RoomNumber'];
$typeId = $_POST['RoomTypeId'];
$status = $_POST['RoomStatus'];
$note = $_POST['Note'];
$check = mysqli_query($conn, "
SELECT * FROM room WHERE RoomNumber='$roomNumber'
");

if (mysqli_num_rows($check) > 0) {
    die("Số phòng đã tồn tại!");
}
// tạo ID
$roomId = "R" . rand(100,999);

$sql = "INSERT INTO room (RoomId, RoomNumber, RoomTypeId, RoomStatus, Note)
VALUES ('$roomId','$roomNumber','$typeId','$status','$note')";

if (mysqli_query($conn, $sql)) {
    header("Location: room_list.php");
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
?>