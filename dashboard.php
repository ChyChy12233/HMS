<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit();
}

$user = $_SESSION['user'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link rel="stylesheet" href="dashboard.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body>

<div class="layout">

<!-- ================= SIDEBAR ================= -->
<div class="sidebar">
  <h2>HMS</h2>

  <a class="active"><i data-lucide="layout-dashboard"></i> Dashboard</a>

  <!-- STAFF -->
  <p class="menu-title">Nhân viên</p>
  <a><i data-lucide="user"></i> Quản lý khách hàng</a>
  <a><i data-lucide="calendar-check"></i> Quản lý đặt phòng</a>
  <a><i data-lucide="file-text"></i> Quản lý hóa đơn</a>
  <a><i data-lucide="bed"></i> Quản lý sử dụng phòng</a>
  <a><i data-lucide="send"></i> Gửi báo cáo sự cố</a>

  <!-- MANAGER -->
  <?php if ($role == 'manager' || $role == 'admin'): ?>
    <p class="menu-title">Quản lý</p>
    <a><i data-lucide="users"></i> Quản lý nhân sự</a>
    <a><i data-lucide="coffee"></i> Quản lý dịch vụ</a>
    <a><i data-lucide="home"></i> Quản lý loại phòng</a>
    <a><i data-lucide="alert-triangle"></i> Quản lý sự cố</a>
    <a><i data-lucide="building"></i> Quản lý cơ sở vật chất</a>
    <a><i data-lucide="box"></i> Quản lý kho tiện nghi</a>
    <a><i data-lucide="bar-chart"></i> Báo cáo thống kê</a>
  <?php endif; ?>

  <!-- ADMIN -->
  <?php if ($role == 'admin'): ?>
    <div class="admin-box">
      <a class="create-btn" href="create_user.php">
        <i data-lucide="user-plus"></i> Tạo tài khoản
      </a>
    </div>
  <?php endif; ?>

</div>

<!-- ================= MAIN ================= -->
<div class="main">

  <div class="topbar">
    <h1>Dashboard</h1>
    <div>👤 <?php echo $user; ?> (<?php echo $role; ?>)</div>
  </div>

  <p>Chào mừng bạn đến hệ thống quản lý khách sạn</p>

  <!-- CARDS -->
  <div class="cards">

    <div class="card">
      <h3>Phòng lấp đầy</h3>
      <h1>85%</h1>
      <p>42/50 phòng</p>
    </div>

    <div class="card">
      <h3>Đặt phòng mới</h3>
      <h1>12</h1>
      <p>Đang xử lý</p>
    </div>

    <div class="card">
      <h3>Yêu cầu dịch vụ</h3>
      <h1>4</h1>
      <p>Đã hoàn tất</p>
    </div>

  </div>

</div>

</div>

<script>
  lucide.createIcons();
</script>

</body>
</html>