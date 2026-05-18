<?php
$conn = mysqli_connect("localhost","root","","hotel");

// FILTER
$month = isset($_GET['month']) ? $_GET['month'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : '';

$where = "WHERE 1=1";

if ($month != '') {
    $where .= " AND MONTH(CreatedAt) = '$month'";
}

if ($year != '') {
    $where .= " AND YEAR(CreatedAt) = '$year'";
}

// TỔNG DOANH THU
$res = mysqli_query($conn, "
SELECT SUM(TotalAmount) as total FROM invoice $where
");
$total = mysqli_fetch_assoc($res)['total'];

// DOANH THU THEO NGÀY
$daily = mysqli_query($conn, "
SELECT DATE(CreatedAt) as day, SUM(TotalAmount) as total
FROM invoice $where
GROUP BY DATE(CreatedAt)
ORDER BY day ASC
");

// DATA CHO CHART
$labels = [];
$data = [];

while($d = mysqli_fetch_assoc($daily)) {
    $labels[] = $d['day'];
    $data[] = $d['total'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Báo cáo doanh thu</title>
    <link rel="stylesheet" href="staff.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<div class="container">

<h2>Báo cáo doanh thu</h2>

<!-- FILTER -->
<form method="GET" class="search-box">

<select name="month">
    <option value="">-- Tháng --</option>
    <?php for($i=1;$i<=12;$i++): ?>
        <option value="<?= $i ?>" <?= ($month==$i)?'selected':'' ?>>
            Tháng <?= $i ?>
        </option>
    <?php endfor; ?>
</select>

<select name="year">
    <option value="">-- Năm --</option>
    <?php for($y=2024;$y<=2030;$y++): ?>
        <option value="<?= $y ?>" <?= ($year==$y)?'selected':'' ?>>
            <?= $y ?>
        </option>
    <?php endfor; ?>
</select>

<button type="submit">Lọc</button>

</form>

<!-- TỔNG -->
<h3 style="margin:15px 0;">
    Tổng doanh thu: 
    <span style="color:#2563eb; font-size:20px;">
        <?= number_format($total ? $total : 0) ?> đ
    </span>
</h3>

<!-- CHART -->
<canvas id="chart" height="100"></canvas>

<script>
const ctx = document.getElementById('chart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Doanh thu',
            data: <?= json_encode($data) ?>,
            borderWidth: 3,
            tension: 0.3,
            fill: true
        }]
    }
});
</script>

<!-- TABLE -->
<h3 style="margin-top:30px;">Chi tiết theo ngày</h3>

<table style="width:100%; border-collapse:collapse;">
<tr style="background:#0a2540; color:white;">
    <th style="padding:10px;">Ngày</th>
    <th style="padding:10px;">Doanh thu</th>
</tr>

<?php
$daily2 = mysqli_query($conn, "
SELECT DATE(CreatedAt) as day, SUM(TotalAmount) as total
FROM invoice $where
GROUP BY DATE(CreatedAt)
ORDER BY day DESC
");

while($d = mysqli_fetch_assoc($daily2)):
?>

<tr>
    <td style="padding:10px;"><?= $d['day'] ?></td>
    <td style="padding:10px;">
        <?= number_format($d['total']) ?> đ
    </td>
</tr>

<?php endwhile; ?>

</table>

</div>

</body>
</html>