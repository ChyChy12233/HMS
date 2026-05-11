<?php
$conn = mysqli_connect("localhost","root","","hotel");

$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($conn, $_GET['keyword']) : "";
$type = isset($_GET['type']) ? $_GET['type'] : "";

$sql = "SELECT * FROM customer WHERE 1";

if ($keyword != "") {
    $sql .= " AND (
        LOWER(CustomerName) LIKE LOWER('%$keyword%') 
        OR PhoneNumber LIKE '%$keyword%'
        OR LOWER(Email) LIKE LOWER('%$keyword%')
    )";
}

if ($type != "") {
    $sql .= " AND CustomerType='$type'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách khách hàng</title>
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="customer.css">
</head>
</head>

<body>

<body>

<div class="container customer-page">

<h2>Danh sách khách hàng</h2>

<a href="add_customer.php" class="add-btn">+ Thêm khách hàng</a>

<!-- SEARCH + FILTER -->
<form method="GET" class="search-box">

    <input type="text" name="keyword" placeholder="Tìm khách..."
           value="<?= $keyword ?>">

    <select name="type">
        <option value="">-- Tất cả loại --</option>
        <option value="Nội địa" <?= ($type=='Nội địa')?'selected':'' ?>>Nội địa</option>
        <option value="Nước ngoài" <?= ($type=='Nước ngoài')?'selected':'' ?>>Nước ngoài</option>
    </select>

    <button type="submit">Tìm</button>
</form>

<table>
<tr>
    <th>ID</th>
    <th>Tên</th>
    <th>SĐT</th>
    <th>Email</th>
    <th>Loại</th>
    <th>Action</th>
</tr>

<?php if (mysqli_num_rows($result) > 0): ?>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $row['CustomerId'] ?></td>
        <td><?= $row['CustomerName'] ?></td>
        <td><?= $row['PhoneNumber'] ?></td>
        <td><?= $row['Email'] ?></td>
        <td><?= $row['CustomerType'] ?></td>

        <td class="action">
            <a href="edit_customer.php?id=<?= $row['CustomerId'] ?>" class="edit">Sửa</a>
            <a href="delete_customer.php?id=<?= $row['CustomerId'] ?>" 
               class="delete"
               onclick="return confirm('Bạn chắc chắn muốn xóa?')">
               Xóa
            </a>
        </td>
    </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr>
        <td colspan="6">Không tìm thấy khách hàng</td>
    </tr>
<?php endif; ?>

</table>

</div>

</body>
</html>