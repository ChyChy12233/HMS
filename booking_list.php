<?php
$conn = mysqli_connect("localhost","root","","hotel");

$sql = "SELECT b.*, c.CustomerName, r.RoomNumber
        FROM booking b
        JOIN customer c ON b.CustomerId = c.CustomerId
        JOIN room r ON b.RoomId = r.RoomId";

$result = mysqli_query($conn, $sql);
?>

<h2>Danh sách đặt phòng</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Phòng</th>
    <th>Khách</th>
    <th>Ngày nhận</th>
    <th>Ngày trả</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?= $row['RoomNumber'] ?></td>
    <td><?= $row['CustomerName'] ?></td>
    <td><?= $row['CheckInDate'] ?></td>
    <td><?= $row['CheckOutDate'] ?></td>
</tr>
<?php endwhile; ?>

</table>