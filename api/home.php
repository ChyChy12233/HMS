<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Segoe UI", Arial, sans-serif; }
    body { background: transparent; padding: 0; }

    .welcome { color: #6b7280; margin-bottom: 20px; font-size: 15px; }

    .cards {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .card {
      background: white;
      padding: 24px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      transition: 0.25s;
    }

    .card:hover { transform: translateY(-5px); }
    .card h3 { font-size: 15px; color: #6b7280; }
    .card h1 { margin-top: 10px; font-size: 32px; color: #111827; }
    .card p  { margin-top: 5px; font-size: 13px; color: #9ca3af; }

    @media (max-width: 800px) {
      .cards { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>
  <p class="welcome">Chào mừng bạn đến hệ thống quản lý khách sạn</p>

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
</body>
</html>
