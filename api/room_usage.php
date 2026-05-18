<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sử dụng phòng</title>

    <link rel="stylesheet" href="room_usage.css">
</head>

<body>

<div class="room-container">

    <h2>Quản lý sử dụng phòng</h2>

    <!-- FILTER -->
    <div class="top-actions">

        <input type="text" placeholder="Tìm số phòng...">

        <select>
            <option>Tất cả trạng thái</option>
            <option>Đang sử dụng</option>
            <option>Phòng trống</option>
            <option>Cần dọn dẹp</option>
        </select>

        <select>
            <option>Tầng 1</option>
            <option>Tầng 2</option>
            <option>Tầng 3</option>
        </select>

        <button>Tìm kiếm</button>

    </div>

    <!-- SUMMARY -->
    <div class="summary-cards">

        <div class="card total">
            <h3>Tổng số phòng</h3>
            <p>120</p>
        </div>

        <div class="card using">
            <h3>Đang sử dụng</h3>
            <p>86</p>
        </div>

        <div class="card empty">
            <h3>Phòng trống</h3>
            <p>24</p>
        </div>

        <div class="card cleaning">
            <h3>Cần dọn dẹp</h3>
            <p>10</p>
        </div>

    </div>

    <!-- TABLE -->
    <div class="room-table">

        <table>

            <tr>
                <th>Số phòng</th>
                <th>Loại phòng</th>
                <th>Khách hàng</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Trạng thái</th>
            </tr>

            <tr>
                <td>106</td>
                <td>Standard</td>
                <td>Vũ Minh Đức</td>
                <td>12/05/2026</td>
                <td>15/05/2026</td>

                <td>
                    <span class="using-status">
                        Đang sử dụng
                    </span>
                </td>
            </tr>

            <tr>
                <td>105</td>
                <td>VIP</td>
                <td>Hà Anh Tuấn</td>
                <td>11/05/2026</td>
                <td>13/05/2026</td>

                <td>
                    <span class="cleaning-status">
                        Cần dọn
                    </span>
                </td>
            </tr>

            <tr>
                <td>702</td>
                <td>Standard</td>
                <td>---</td>
                <td>---</td>
                <td>---</td>

                <td>
                    <span class="empty-status">
                        Phòng trống
                    </span>
                </td>
            </tr>

        </table>

    </div>

</div>

</body>
</html>