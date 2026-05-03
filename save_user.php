<?php
$conn = mysqli_connect("localhost", "root", "", "hotel");

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// check trùng username
$check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('Username đã tồn tại!'); history.back();</script>";
    exit();
}

// 🔥 HASH PASSWORD (DÒNG QUAN TRỌNG)
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// insert
$sql = "INSERT INTO users (username, password, role)
        VALUES ('$username', '$passwordHash', '$role')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Tạo tài khoản thành công!');
        window.location='index.html';
    </script>";
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
?>