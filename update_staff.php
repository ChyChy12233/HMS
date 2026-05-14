<?php
$conn = mysqli_connect("localhost","root","","hotel");

$id = $_POST['StaffId'];

$StaffName = $_POST['StaffName'];
$PhoneNumber = $_POST['PhoneNumber'];
$Email = $_POST['Email'];
$CCCD = $_POST['CCCD'];
$Birthday = $_POST['Birthday'];
$Gender = $_POST['Gender'];
$Position = $_POST['Position'];
$Username = $_POST['Username'];
$Role = $_POST['Role'];

$sql = "UPDATE staff SET 
    StaffName='$StaffName',
    PhoneNumber='$PhoneNumber',
    Email='$Email',
    CCCD='$CCCD',
    Birthday='$Birthday',
    Gender='$Gender',
    Position='$Position',
    Username='$Username',
    Role='$Role'
WHERE StaffId='$id'";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Cập nhật thành công!');
        window.location='staff_list.php';
    </script>";
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
?>