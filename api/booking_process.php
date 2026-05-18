<?php
$conn = mysqli_connect("localhost","root","","hotel");

$customerId = $_POST['CustomerId'];
$roomId = $_POST['RoomId'];
$checkIn = $_POST['CheckInDate'];
$checkOut = $_POST['CheckOutDate'];

// ❗ CHECK TRÙNG NGÀY
$check = mysqli_query($conn, "
SELECT * FROM booking
WHERE RoomId = '$roomId'
AND (
    ('$checkIn' < CheckOutDate) AND ('$checkOut' > CheckInDate)
)
");

if (mysqli_num_rows($check) > 0) {
    die("❌ Phòng đã được đặt trong khoảng thời gian này!");
}

// tạo id
$bookingId = "B" . rand(1000,9999);

// insert
mysqli_query($conn, "
INSERT INTO booking 
VALUES (
    '$bookingId',
    '$customerId',
    '$roomId',
    '$checkIn',
    '$checkOut',
    'Đã đặt'
)
");

// update trạng thái
mysqli_query($conn, "
UPDATE room 
SET RoomStatus = 'Phòng đã đặt'
WHERE RoomId = '$roomId'
");

header("Location: booking_list.php");
?>