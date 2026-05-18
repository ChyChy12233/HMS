<?php
$conn = mysqli_connect("localhost","root","","hotel");

$CustomerName = $_POST['CustomerName'];
$PhoneNumber = $_POST['PhoneNumber'];
$Email = $_POST['Email'];
$CCCD = $_POST['CCCD'];
$Birthday = $_POST['Birthday'];
$Gender = $_POST['Gender'];
$CustomerType = $_POST['CustomerType'];
$CustomerAddress = $_POST['CustomerAddress'];

// tạo ID
$CustomerId = "KH" . rand(100,999);

// insert
$sql = "INSERT INTO customer 
(CustomerId, CustomerName, PhoneNumber, Email, CCCD, Birthday, Gender, CustomerType, CustomerAddress)
VALUES 
('$CustomerId','$CustomerName','$PhoneNumber','$Email','$CCCD','$Birthday','$Gender','$CustomerType','$CustomerAddress')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Thêm khách hàng thành công!');
        window.location='customer_list.php';
    </script>";
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
?>