<?php
$conn = mysqli_connect("localhost","root","","hotel");

// lấy khách
$customers = mysqli_query($conn, "SELECT * FROM customer");

// lấy phòng trống
$rooms = mysqli_query($conn, "SELECT * FROM room WHERE RoomStatus='Phòng trống'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Check-in</title>
    <link rel="stylesheet" href="add_staff.css">
</head>

<body>

<div class="form-container">
<h2>Check-in khách</h2>

<form action="save_checkin.php" method="POST">

    <div class="input-group">
        <label>Khách hàng</label>
        <select name="CustomerId" required>
            <?php while($c = mysqli_fetch_assoc($customers)): ?>
            <option value="<?= $c['CustomerId'] ?>">
                <?= $c['CustomerName'] ?> - <?= $c['PhoneNumber'] ?>
            </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="input-group">
        <label>Phòng</label>
        <select name="RoomId" required>
            <?php while($r = mysqli_fetch_assoc($rooms)): ?>
            <option value="<?= $r['RoomId'] ?>">
                Phòng <?= $r['RoomNumber'] ?>
            </option>
            <?php endwhile; ?>
        </select>
    </div>

    <button type="submit">Check-in</button>

</form>
</div>

</body>
</html>