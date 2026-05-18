<?php
$conn = mysqli_connect("localhost", "root", "", "hotel");

// LẤY DỮ LIỆU ĐÚNG
$StaffName = $_POST['StaffName'];
$PhoneNumber = $_POST['PhoneNumber'];
$Email = $_POST['Email'];
$CCCD = $_POST['CCCD'];
$Birthday = $_POST['Birthday'];
$Gender = $_POST['Gender'];
$Position = $_POST['Position'];
$Username = $_POST['Username'];
$Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
$Role = $_POST['Role'];

$staffId = "NV" . rand(100,999);

// INSERT
$sql = "INSERT INTO staff 
(StaffId, StaffName, PhoneNumber, Email, CCCD, Birthday, Gender, Position, Username, Password, Role)
VALUES 
('$staffId','$StaffName','$PhoneNumber','$Email','$CCCD','$Birthday','$Gender','$Position','$Username','$Password','$Role')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Thêm nhân viên thành công!');
        window.location='staff_list.php';
    </script>";
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
?>