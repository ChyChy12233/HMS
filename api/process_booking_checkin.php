<?php
$conn = mysqli_connect("localhost","root","","hotel");

$type = $_POST['type'];
$customerId = $_POST['CustomerId'];
$roomId = $_POST['RoomId'];
$checkIn = $_POST['CheckInDate'];
$checkOut = $_POST['CheckOutDate'];

// ❗ CHECK KHÁCH ĐANG Ở
$checkStay = mysqli_query($conn, "
SELECT * FROM room_customer 
WHERE CustomerId = '$customerId' 
AND Status = 'Đang ở'
");

if (mysqli_num_rows($checkStay) > 0) {
    die("❌ Khách này đang ở phòng khác!");
}

// ❗ CHECK TRÙNG PHÒNG
$checkRoom = mysqli_query($conn, "
SELECT * FROM booking
WHERE RoomId = '$roomId'
AND ('$checkIn' < CheckOutDate AND '$checkOut' > CheckInDate)
");

if (mysqli_num_rows($checkRoom) > 0) {
    die("❌ Phòng đã có người đặt!");
}

// tạo id
$bookingId = "B" . rand(1000,9999);

if ($type == 'walkin') {

    // booking = đang ở
    mysqli_query($conn, "
    INSERT INTO booking 
    VALUES ('$bookingId','$customerId','$roomId','$checkIn','$checkOut','Đang ở')
    ");

    // room_customer
    $rcId = "RC" . rand(1000,9999);

    mysqli_query($conn, "
    INSERT INTO room_customer 
    (RoomCustomerId, RoomId, CustomerId, CheckIn, Status)
    VALUES ('$rcId','$roomId','$customerId',NOW(),'Đang ở')
    ");

    // update phòng
    mysqli_query($conn, "
    UPDATE room SET RoomStatus='Phòng đang thuê' 
    WHERE RoomId='$roomId'
    ");

} else {

    // booking thường
    mysqli_query($conn, "
    INSERT INTO booking 
    VALUES ('$bookingId','$customerId','$roomId','$checkIn','$checkOut','Đã đặt')
    ");

}

header("Location: dashboard.php");
?>