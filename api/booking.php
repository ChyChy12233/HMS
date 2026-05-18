<?php
$conn = mysqli_connect("localhost","root","","hotel");

// lấy khách
$customers = mysqli_query($conn, "SELECT * FROM customer");

// lấy ngày từ GET
$checkIn = isset($_GET['CheckInDate']) ? $_GET['CheckInDate'] : '';
$checkOut = isset($_GET['CheckOutDate']) ? $_GET['CheckOutDate'] : '';

$rooms = null;

// chỉ query phòng khi đã chọn ngày
if ($checkIn && $checkOut) {
    $sqlRoom = "SELECT * FROM room WHERE RoomId NOT IN (
        SELECT RoomId FROM booking
        WHERE (
            ('$checkIn' < CheckOutDate) AND ('$checkOut' > CheckInDate)
        )
    )";

    $rooms = mysqli_query($conn, $sqlRoom);
}
?>

<h2>Đặt phòng</h2>

<!-- 🔵 FORM 1: CHỌN NGÀY -->
<form method="GET">
    <label>Ngày nhận:</label>
    <input type="date" name="CheckInDate" required value="<?= $checkIn ?>">

    <label>Ngày trả:</label>
    <input type="date" name="CheckOutDate" required value="<?= $checkOut ?>">

    <button type="submit">Kiểm tra phòng</button>
</form>

<br><br>

<!-- 🔵 FORM 2: ĐẶT PHÒNG -->
<?php if($checkIn && $checkOut): ?>

<form method="POST" action="booking_process.php">

<input type="hidden" name="CheckInDate" value="<?= $checkIn ?>">
<input type="hidden" name="CheckOutDate" value="<?= $checkOut ?>">

<select name="CustomerId" required>
    <option value="">Chọn khách</option>
    <?php while($c = mysqli_fetch_assoc($customers)): ?>
        <option value="<?= $c['CustomerId'] ?>">
            <?= $c['CustomerName'] ?>
        </option>
    <?php endwhile; ?>
</select>

<br><br>

<select name="RoomId" required>
    <option value="">Chọn phòng</option>
    <?php while($r = mysqli_fetch_assoc($rooms)): ?>
        <option value="<?= $r['RoomId'] ?>">
            Phòng <?= $r['RoomNumber'] ?>
        </option>
    <?php endwhile; ?>
</select>

<br><br>

<button type="submit">Đặt phòng</button>

</form>

<?php endif; ?>