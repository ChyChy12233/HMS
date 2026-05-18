<?php
$conn = mysqli_connect("localhost", "root", "", "hotel");

// LẤY DỮ LIỆU
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$role = $_POST['role'];

// CHECK TRÙNG USERNAME
$check = mysqli_query($conn, "SELECT * FROM staff WHERE Username='$username'");

if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('Username đã tồn tại!'); history.back();</script>";
    exit();
}

// HASH PASSWORD
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// TẠO ID NGẪU NHIÊN
$staffId = "NV" . rand(100,999);

// INSERT FULL DATA
$sql = "INSERT INTO staff 
(StaffId, StaffName, PhoneNumber, Email, CCCD, Birthday, Gender, Position, Username, Password, Role)
VALUES 
('$staffId', 'New User', '0123456789', 'test@gmail.com', '123456789', '2000-01-01', 'Nam', 'Nhân viên', '$username', '$passwordHash', '$role')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Tạo tài khoản thành công!');
        window.location='index.html';
    </script>";
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
?>