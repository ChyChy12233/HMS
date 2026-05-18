<?php
$conn = mysqli_connect("localhost","root","","hotel");

// DEBUG input
if (!isset($_POST['RoomId']) || !isset($_POST['CustomerId'])) {
    die("Thiếu dữ liệu form");
}

$roomId = $_POST['RoomId'];
$customerId = $_POST['CustomerId'];
$check = mysqli_query($conn, "
SELECT * FROM room_customer 
WHERE RoomId='$roomId' AND Status='Đang ở'
");

if (mysqli_num_rows($check) > 0) {
    die("Phòng này đã có người!");
}
// lấy khách
$res = mysqli_query($conn, "SELECT * FROM customer WHERE CustomerId='$customerId'");
$customer = mysqli_fetch_assoc($res);

if (!$customer) {
    die("Không tìm thấy khách");
}

// tạo id
$roomCustomerId = "RC" . rand(1000,9999);

$roomCustomerId = "RC" . rand(1000,9999);

$sql = "INSERT INTO room_customer (
    RoomCustomerId,
    RoomId,
    CustomerId,
    CheckIn,
    Status
) VALUES (
    '$roomCustomerId',
    '$roomId',
    '$customerId',
    NOW(),
    'Đang ở'
)";

if (!mysqli_query($conn, $sql)) {
    die("Lỗi SQL: " . mysqli_error($conn));
}

// update phòng
mysqli_query($conn, "
UPDATE room 
SET RoomStatus='Phòng đang thuê' 
WHERE RoomId='$roomId'
");

header("Location: room_usage.php");
?>