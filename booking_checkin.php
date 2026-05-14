<?php
$conn = mysqli_connect("localhost","root","","hotel");

// khách
$customers = mysqli_query($conn, "SELECT * FROM customer");

// phòng trống
$rooms = mysqli_query($conn, "
SELECT * FROM room 
WHERE RoomStatus = 'Phòng trống'
");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="stylesheet" href="booking.css">
<meta charset="UTF-8">
<title>Đặt / Nhận phòng</title>

<style>
body {
  font-family: "Segoe UI";
  background: linear-gradient(135deg,#0a2540,#081f3a);
  padding: 40px;
}

.container {
  max-width: 600px;
  margin: auto;
  background: white;
  padding: 30px;
  border-radius: 18px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.25);
}

h2 {
  margin-bottom: 20px;
  color: #0a2540;
}

.form-group {
  margin-bottom: 15px;
}

select, input {
  width: 100%;
  padding: 10px;
  border-radius: 10px;
  border: 1px solid #ddd;
}

button {
  width: 100%;
  padding: 12px;
  border-radius: 12px;
  border: none;
  background: linear-gradient(135deg,#2563eb,#1e40af);
  color: white;
  cursor: pointer;
}

.notice {
  margin-top: 10px;
  font-size: 14px;
  color: red;
}
</style>

</head>
<body>

<div class="container">

<h2>Đặt phòng / Nhận phòng</h2>

<form method="POST" action="process_booking_checkin.php">

<div class="form-group">
<select name="type" id="typeSelect">
    <option value="walkin">Nhận phòng ngay</option>
    <option value="booking">Đặt trước</option>
</select>
</div>

<div class="form-group">
<select name="CustomerId" id="customerSelect" required>
    <option value="">Chọn khách</option>
    <?php while($c = mysqli_fetch_assoc($customers)): ?>
        <option value="<?= $c['CustomerId'] ?>">
            <?= $c['CustomerName'] ?>
        </option>
    <?php endwhile; ?>
</select>
</div>

<div class="form-group">
<select name="RoomId" id="roomSelect" required>
    <option value="">Chọn phòng</option>
    <?php while($r = mysqli_fetch_assoc($rooms)): ?>
        <option value="<?= $r['RoomId'] ?>">
            Phòng <?= $r['RoomNumber'] ?>
        </option>
    <?php endwhile; ?>
</select>
</div>

<div id="dateFields">

<div class="form-group">
<input type="date" name="CheckInDate">
</div>

<div class="form-group">
<input type="date" name="CheckOutDate">
</div>

</div>

<button type="submit">Xác nhận</button>

<div id="notice" class="notice"></div>

</form>

</div>

<script>

// Ẩn ngày nếu check-in ngay
document.getElementById("typeSelect").addEventListener("change", function(){
    const dateFields = document.getElementById("dateFields");
    if(this.value === "walkin"){
        dateFields.style.display = "none";
    } else {
        dateFields.style.display = "block";
    }
});

// 🔥 CHECK KHÁCH ĐANG Ở (quan trọng)
document.getElementById("customerSelect").addEventListener("change", function(){

    let customerId = this.value;

    fetch("check_customer_room.php?customerId=" + customerId)
    .then(res => res.json())
    .then(data => {

        let roomSelect = document.getElementById("roomSelect");
        let notice = document.getElementById("notice");

        if(data.status === "occupied"){
            roomSelect.value = data.roomId;
            roomSelect.disabled = true;
            notice.innerText = "⚠ Khách đang ở phòng " + data.roomNumber;
        } else {
            roomSelect.disabled = false;
            notice.innerText = "";
        }
    });
});
</script>

</body>
</html>