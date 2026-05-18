<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý kho tiện nghi</title>

    <link rel="stylesheet" href="../facility.css">
</head>

<body>

<div class="facility-container">

    <h2>Quản lý kho tiện nghi</h2>

    <!-- ACTION -->
    <div class="top-actions">

        <input type="text" placeholder="Tìm tiện nghi...">

        <select>
            <option>Tất cả loại</option>
            <option>Điện tử</option>
            <option>Phòng tắm</option>
            <option>Nội thất</option>
        </select>

        <button>Tìm</button>

        <button
            class="add-btn"
            onclick="toggleForm()"
        >
            + Tiện nghi mới
        </button>

    </div>

    <!-- LAYOUT -->
    <div id="facilityLayout" class="facility-layout">

        <!-- TABLE -->
        <div class="facility-table">

            <table>

                <tr>
                    <th>Mã TN</th>
                    <th>Tên tiện nghi</th>
                    <th>Loại</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </tr>

                <tr>
                    <td>TN001</td>
                    <td>Máy sấy tóc</td>
                    <td>Điện tử</td>
                    <td>25</td>

                    <td>
                        <span class="available">
                            Còn hàng
                        </span>
                    </td>

                    <td>
                        <a href="#" class="edit-btn">Sửa</a>
                        <a href="#" class="delete-btn">Xóa</a>
                    </td>
                </tr>

                <tr>
                    <td>TN002</td>
                    <td>Khăn tắm</td>
                    <td>Phòng tắm</td>
                    <td>5</td>

                    <td>
                        <span class="low-stock">
                            Sắp hết
                        </span>
                    </td>

                    <td>
                        <a href="#" class="edit-btn">Sửa</a>
                        <a href="#" class="delete-btn">Xóa</a>
                    </td>
                </tr>

                <tr>
                    <td>TN003</td>
                    <td>Mini Bar</td>
                    <td>Nội thất</td>
                    <td>0</td>

                    <td>
                        <span class="out-stock">
                            Hết hàng
                        </span>
                    </td>

                    <td>
                        <a href="#" class="edit-btn">Sửa</a>
                        <a href="#" class="delete-btn">Xóa</a>
                    </td>
                </tr>

            </table>

        </div>

        <!-- FORM -->
        <div id="facilityForm" class="facility-form">

            <h3>Thêm tiện nghi</h3>

            <div class="form-group">
                <label>Tên tiện nghi</label>
                <input type="text">
            </div>

            <div class="form-group">
                <label>Loại tiện nghi</label>

                <select>
                    <option>Điện tử</option>
                    <option>Phòng tắm</option>
                    <option>Nội thất</option>
                </select>
            </div>

            <div class="form-group">
                <label>Số lượng</label>

                <select>
                    <option>5</option>
                    <option>10</option>
                    <option>20</option>
                    <option>50</option>
                </select>
            </div>

            <div class="form-group">
                <label>Trạng thái</label>

                <select>
                    <option>Còn hàng</option>
                    <option>Sắp hết</option>
                    <option>Hết hàng</option>
                </select>
            </div>

            <button class="save-btn">
                Lưu tiện nghi
            </button>

        </div>

    </div>

</div>

<script>

function toggleForm(){

    const layout = document.getElementById("facilityLayout");

    layout.classList.toggle("show-form");

}

</script>

</body>
</html>
