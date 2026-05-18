<?php
$conn = mysqli_connect("localhost","root","","hotel");

$roomId = $_GET['roomId'];

// lấy thông tin đang ở
$res = mysqli_query($conn, "
SELECT rc.*, r.Price 
FROM room_customer rc
JOIN room r ON rc.RoomId = r.RoomId
WHERE rc.RoomId='$roomId' AND rc.Status='Đang ở'
");

$data = mysqli_fetch_assoc($res);

if (!$data) {
    die("Không có khách đang ở");
}

// tính tiền
$checkIn = strtotime($data['CheckIn']);
$checkOut = time();

$days = ceil(($checkOut - $checkIn) / (60*60*24));
if ($days <= 0) $days = 1;

$total = $days * $data['Price'];

// tạo invoice
$invoiceId = "INV" . rand(1000,9999);

mysqli_query($conn, "
INSERT INTO invoice (
    InvoiceId, RoomId, CustomerId, CheckIn, CheckOut, TotalAmount
) VALUES (
    '$invoiceId',
    '{$data['RoomId']}',
    '{$data['CustomerId']}',
    '{$data['CheckIn']}',
    NOW(),
    '$total'
)
");

// update phòng
mysqli_query($conn, "
UPDATE room SET RoomStatus='Phòng trống'
WHERE RoomId='{$data['RoomId']}'
");

// update room_customer
mysqli_query($conn, "
UPDATE room_customer 
SET Status='Đã trả phòng', CheckOut=NOW()
WHERE RoomCustomerId='{$data['RoomCustomerId']}'
");

header("Location: invoice_list.php");
?>