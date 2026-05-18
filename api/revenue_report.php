<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Báo cáo doanh thu</title>

    <link rel="stylesheet" href="revenue.css">
</head>

<body>

<div class="revenue-container">

    <h2>Báo cáo doanh thu khách sạn</h2>

    <!-- FILTER -->
    <div class="top-actions">

        <!-- LOẠI BÁO CÁO -->
        <select>
            <option>Báo cáo theo tháng</option>
            <option>Báo cáo theo quý</option>
            <option>Báo cáo theo loại phòng</option>
            <option>Báo cáo theo khoảng thời gian</option>
        </select>

        <!-- THÁNG -->
        <input type="month">

        <!-- QUÝ -->
        <select>
            <option>Quý 1</option>
            <option>Quý 2</option>
            <option>Quý 3</option>
            <option>Quý 4</option>
        </select>

        <!-- LOẠI PHÒNG -->
        <select>
            <option>Standard</option>
            <option>Deluxe</option>
            <option>VIP</option>
        </select>

        <!-- TỪ NGÀY -->
        <input type="date">

        <!-- ĐẾN NGÀY -->
        <input type="date">

        <button>Xem báo cáo</button>

        <button class="export-btn">
            Xuất Excel
        </button>

    </div>

    <!-- SUMMARY -->
    <div class="summary-cards">

        <div class="card revenue">
            <h3>Tổng doanh thu</h3>
            <p>1.250.000.000đ</p>
        </div>

        <div class="card booking">
            <h3>Tổng lượt đặt phòng</h3>
            <p>320</p>
        </div>

        <div class="card room">
            <h3>Doanh thu phòng VIP</h3>
            <p>420.000.000đ</p>
        </div>

        <div class="card profit">
            <h3>Lợi nhuận</h3>
            <p>540.000.000đ</p>
        </div>

    </div>

    <!-- TABLE -->
    <div class="report-table">

        <table>

            <tr>
                <th>Thời gian</th>
                <th>Loại phòng</th>
                <th>Doanh thu phòng</th>
                <th>Doanh thu dịch vụ</th>
                <th>Tổng doanh thu</th>
                <th>Tăng trưởng</th>
            </tr>

            <tr>
                <td>01/2026</td>
                <td>VIP</td>
                <td>180.000.000đ</td>
                <td>35.000.000đ</td>
                <td>215.000.000đ</td>

                <td>
                    <span class="up">
                        +12%
                    </span>
                </td>
            </tr>

            <tr>
                <td>Quý 1 - 2026</td>
                <td>Deluxe</td>
                <td>320.000.000đ</td>
                <td>65.000.000đ</td>
                <td>385.000.000đ</td>

                <td>
                    <span class="up">
                        +8%
                    </span>
                </td>
            </tr>

            <tr>
                <td>01/03 - 30/03</td>
                <td>Standard</td>
                <td>150.000.000đ</td>
                <td>20.000.000đ</td>
                <td>170.000.000đ</td>

                <td>
                    <span class="down">
                        -4%
                    </span>
                </td>
            </tr>

            <tr>
                <td>04/2026</td>
                <td>VIP</td>
                <td>240.000.000đ</td>
                <td>50.000.000đ</td>
                <td>290.000.000đ</td>

                <td>
                    <span class="up">
                        +15%
                    </span>
                </td>
            </tr>

        </table>

    </div>

</div>

</body>
</html>