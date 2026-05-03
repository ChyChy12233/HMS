<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "hotel");

// LẤY DỮ LIỆU
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$role = $_POST['role'];

// LẤY USER THEO USERNAME
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

// KIỂM TRA CÓ USER KHÔNG
if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);

    // CHECK PASSWORD
    if (password_verify($password, $user['password'])) {

        // CHECK ROLE
        if ($user['role'] != $role) {
            echo "<script>
                alert('Sai vai trò!');
                window.location='index.html';
            </script>";
            exit();
        }

        // LOGIN SUCCESS
        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header("Location: dashboard.php");
        exit();

    } else {
        echo "<script>
            alert('Sai mật khẩu!');
            window.location='index.html';
        </script>";
    }

} else {
    echo "<script>
        alert('Sai tài khoản!');
        window.location='index.html';
    </script>";
}
?>