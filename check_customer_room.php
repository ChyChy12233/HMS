<?php
$conn = mysqli_connect("localhost","root","","hotel");

$customerId = $_GET['customerId'];

$res = mysqli_query($conn, "
SELECT rc.*, r.RoomNumber 
FROM room_customer rc
JOIN room r ON rc.RoomId = r.RoomId
WHERE rc.CustomerId = '$customerId'
AND rc.Status = 'Đang ở'
");

if(mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_assoc($res);

    echo json_encode([
        "status" => "occupied",
        "roomId" => $row['RoomId'],
        "roomNumber" => $row['RoomNumber']
    ]);
} else {
    echo json_encode(["status" => "free"]);
}