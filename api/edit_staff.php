<?php
$conn = mysqli_connect("localhost","root","","hotel");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM staff WHERE StaffId='$id'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa nhân viên</title>
    <link rel="stylesheet" href="../add_staff.css">
</head>

<body>

<div class="form-container">

    <h2>Chỉnh sửa nhân viên</h2>

    <form action="update_staff.php" method="POST">

        <input type="hidden" name="StaffId" value="<?= $row['StaffId'] ?>">

        <div class="input-group">
            <label>Họ và tên</label>
            <input type="text" name="StaffName" value="<?= $row['StaffName'] ?>" required>
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
            <input type="date" name="Birthday" value="<?= $row['Birthday'] ?>">
        </div>

        <div class="input-group">
            <label>Giới tính</label>
            <select name="Gender">
                <option value="Nam" <?= ($row['Gender']=="Nam")?'selected':'' ?>>Nam</option>
                <option value="Nữ" <?= ($row['Gender']=="Nữ")?'selected':'' ?>>Nữ</option>
            </select>
        </div>

        <div class="input-group">
            <label>Chức vụ</label>
            <select name="Position">
                <option value="Nhân viên" <?= ($row['Position']=="Nhân viên")?'selected':'' ?>>Nhân viên</option>
                <option value="Quản lý" <?= ($row['Position']=="Quản lý")?'selected':'' ?>>Quản lý</option>
            </select>
        </div>

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="Username" value="<?= $row['Username'] ?>" required>
        </div>

        <div class="input-group">
            <label>Role</label>
            <select name="Role">
                <option value="staff" <?= ($row['Role']=="staff")?'selected':'' ?>>Staff</option>
                <option value="manager" <?= ($row['Role']=="manager")?'selected':'' ?>>Manager</option>
                <option value="admin" <?= ($row['Role']=="admin")?'selected':'' ?>>Admin</option>
            </select>
        </div>

        <button type="submit">Cập nhật</button>

    </form>

</div>

</body>
</html>
