<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "hotel");

$username = trim($_POST['username']);
$password = trim($_POST['password']);
$role = $_POST['role'];

// LẤY USER
$sql = "SELECT * FROM staff WHERE Username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result); // 👈 QUAN TRỌNG

    // CHECK PASSWORD
    if (password_verify($password, $user['Password'])) {

        // CHECK ROLE
        if ($user['Role'] != $role) {
            echo "<script>
                alert('Sai vai trò!');
                window.location='index.html';
            </script>";
            exit();
        }

        // LOGIN SUCCESS
        $_SESSION['user'] = $user['Username'];
        $_SESSION['role'] = $user['Role'];

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