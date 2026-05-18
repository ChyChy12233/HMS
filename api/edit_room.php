<?php
$conn = mysqli_connect("localhost","root","","hotel");

$id = $_GET['id'];

$res = mysqli_query($conn, "SELECT * FROM room WHERE RoomId='$id'");
$row = mysqli_fetch_assoc($res);

$types = mysqli_query($conn, "SELECT * FROM room_type");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa phòng</title>
    <link rel="stylesheet" href="add_staff.css">
</head>

<body>

<div class="form-container">

<h2>Sửa phòng</h2>

<form action="update_room.php" method="POST">

<input type="hidden" name="RoomId" value="<?= $row['RoomId'] ?>">

<div class="input-group">
    <label>Số phòng</label>
    <input type="number" name="RoomNumber" value="<?= $row['RoomNumber'] ?>">
</div>

<div class="input-group">
    <label>Loại phòng</label>
    <select name="RoomTypeId">
        <?php while($t = mysqli_fetch_assoc($types)): ?>
        <option value="<?= $t['RoomTypeId'] ?>"
        <?= ($t['RoomTypeId']==$row['RoomTypeId'])?'selected':'' ?>>
        <?= $t['RoomTypeName'] ?>
        </option>
        <?php endwhile; ?>
    </select>
</div>

<div class="input-group">
    <label>Trạng thái</label>
    <select name="RoomStatus">
        <option <?= ($row['RoomStatus']=="Phòng trống")?'selected':'' ?>>Phòng trống</option>
        <option <?= ($row['RoomStatus']=="Phòng đã đặt")?'selected':'' ?>>Phòng đã đặt</option>
        <option <?= ($row['RoomStatus']=="Phòng đang thuê")?'selected':'' ?>>Phòng đang thuê</option>
    </select>
</div>

<div class="input-group">
    <label>Ghi chú</label>
    <input type="text" name="Note" value="<?= $row['Note'] ?>">
</div>

<button type="submit">Cập nhật</button>

</form>

</div>
</body>
</html>