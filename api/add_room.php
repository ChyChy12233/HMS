<?php
$conn = mysqli_connect("localhost","root","","hotel");

// lấy loại phòng
$types = mysqli_query($conn, "SELECT * FROM room_type");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm phòng</title>
    <link rel="stylesheet" href="../add_staff.css">
</head>

<body>

<div class="form-container">
<h2>Thêm phòng</h2>

<form action="save_room.php" method="POST">

    <div class="input-group">
        <label>Số phòng</label>
        <input type="number" name="RoomNumber" required>
    </div>

    <div class="input-group">
        <label>Loại phòng</label>
        <select name="RoomTypeId">
            <?php while($t = mysqli_fetch_assoc($types)): ?>
            <option value="<?= $t['RoomTypeId'] ?>">
                <?= $t['RoomTypeName'] ?>
            </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="input-group">
        <label>Trạng thái</label>
        <select name="RoomStatus">
            <option value="Phòng trống">Phòng trống</option>
            <option value="Phòng đã đặt">Phòng đã đặt</option>
            <option value="Phòng đang thuê">Phòng đang thuê</option>
        </select>
    </div>

    <div class="input-group">
        <label>Ghi chú</label>
        <input type="text" name="Note">
    </div>

    <button type="submit">Thêm phòng</button>

</form>
</div>

</body>
</html>
