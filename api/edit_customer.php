<?php
$conn = mysqli_connect("localhost","root","","hotel");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM customer WHERE CustomerId='$id'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa khách hàng</title>
    <link rel="stylesheet" href="../add_staff.css">
</head>

<body>

<div class="form-container">

<h2>Chỉnh sửa khách hàng</h2>

<form action="update_customer.php" method="POST">

    <input type="hidden" name="CustomerId" value="<?= $row['CustomerId'] ?>">

    <div class="input-group">
        <label>Tên khách hàng</label>
        <input type="text" name="CustomerName" value="<?= $row['CustomerName'] ?>" required>
    </div>

    <div class="input-group">
        <label>SĐT</label>
        <input type="text" name="PhoneNumber" value="<?= $row['PhoneNumber'] ?>" required>
    </div>

    <div class="input-group">
        <label>Email</label>
        <input type="email" name="Email" value="<?= $row['Email'] ?>" required>
    </div>

    <div class="input-group">
        <label>CCCD</label>
        <input type="text" name="CCCD" value="<?= $row['CCCD'] ?>" required>
    </div>

    <div class="input-group">
        <label>Ngày sinh</label>
        <input type="date" name="Birthday" value="<?= $row['Birthday'] ?>" required>
    </div>

    <div class="input-group">
        <label>Giới tính</label>
        <select name="Gender">
            <option value="Nam" <?= ($row['Gender']=="Nam")?'selected':'' ?>>Nam</option>
            <option value="Nữ" <?= ($row['Gender']=="Nữ")?'selected':'' ?>>Nữ</option>
        </select>
    </div>

    <div class="input-group">
        <label>Loại khách</label>
        <select name="CustomerType">
            <option value="Nội địa" <?= ($row['CustomerType']=="Nội địa")?'selected':'' ?>>Nội địa</option>
            <option value="Nước ngoài" <?= ($row['CustomerType']=="Nước ngoài")?'selected':'' ?>>Nước ngoài</option>
        </select>
    </div>

    <div class="input-group">
        <label>Địa chỉ</label>
        <input type="text" name="CustomerAddress" value="<?= $row['CustomerAddress'] ?>" required>
    </div>

    <button type="submit">Cập nhật</button>

</form>

</div>

</body>
</html>
