<?php
$conn = mysqli_connect("localhost","root","","hotel");

$sql = "

SELECT 

    b.*,

    c.CustomerName,

    c.StayCount,

    c.TotalSpent,

    r.RoomNumber,

    rt.RoomTypeName

FROM booking b

JOIN customer c 
ON b.CustomerId = c.CustomerId

JOIN room r 
ON b.RoomId = r.RoomId

JOIN room_type rt
ON r.RoomTypeId = rt.RoomTypeId

";

$result = mysqli_query($conn, $sql);
?>

<div class="booking-container">

<h2>Danh sách đặt phòng</h2>

<table border="1" cellpadding="10">

<tr>

    <th>Phòng</th>

    <th>Khách</th>

    <th>Ngày nhận</th>

    <th>Ngày trả</th>

    <th>Hạng KH</th>

    <th>Voucher đề xuất</th>

</tr>

<?php while($row = mysqli_fetch_assoc($result)): ?>

<?php

$customerLevel = "New";

if($row['StayCount'] >= 10){

    $customerLevel = "VIP";
}
else if($row['StayCount'] >= 5){

    $customerLevel = "Regular";
}

?>

<tr>

    <td><?= $row['RoomNumber'] ?></td>

    <td><?= $row['CustomerName'] ?></td>

    <td><?= $row['CheckInDate'] ?></td>

    <td><?= $row['CheckOutDate'] ?></td>

    <!-- LEVEL -->
    <td>

        <?php

        if($customerLevel == "VIP"){

            echo "<span class='vip'>VIP</span>";
        }
        else if($customerLevel == "Regular"){

            echo "<span class='regular'>Regular</span>";
        }
        else{

            echo "<span class='new'>New</span>";
        }

        ?>

    </td>

    <!-- VOUCHER -->
    <td>

        <?php

        if(
            $customerLevel == "VIP"
            &&
            $row['RoomTypeName'] == "Suite"
        ){

            echo "<span class='voucher'>
                    Giảm 20%
                  </span>";
        }
        else if($customerLevel == "Regular"){

            echo "<span class='voucher'>
                    Giảm 5%
                  </span>";
        }
        else{

            echo "-";
        }

        ?>

    </td>

</tr>

<?php endwhile; ?>

</table>

</div>