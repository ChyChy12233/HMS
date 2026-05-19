<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý dịch vụ</title>

    <link rel="stylesheet" href="../service.css">
</head>

<body>

<div class="service-container">

    <h2>Quản lý dịch vụ</h2>

    <!-- ACTION -->
    <div class="top-actions">

        <input
            type="text"
            placeholder="Tìm dịch vụ..."
        >

        <select>
            <option>Tất cả loại</option>
            <option>Ăn uống</option>
            <option>Giải trí</option>
            <option>Tiện ích</option>
        </select>

        <button>Tìm</button>
       <button
    class="add-btn"
    onclick="toggleForm()"
>
    + Dịch vụ mới
</button>
    </div>

   <!-- SERVICE LAYOUT -->
<div id="serviceLayout" class="service-layout">

    <!-- LEFT : TABLE -->
    <div class="service-table">

        <table>

            <tr>
                <th>Mã DV</th>
                <th>Tên dịch vụ</th>
                <th>Loại</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Action</th>
            </tr>

            <tr>
                <td>DV001</td>
                <td>Buffet sáng</td>
                <td>Ăn uống</td>
                <td>250.000đ</td>

                <td>
                    <span class="active">
                        Đang hoạt động
                    </span>
                </td>

                <td>
                    <a href="#" class="edit-btn">Sửa</a>
                    <a href="#" class="delete-btn">Xóa</a>
                </td>
            </tr>

            <tr>
                <td>DV002</td>
                <td>Spa thư giãn</td>
                <td>Giải trí</td>
                <td>500.000đ</td>

                <td>
                    <span class="active">
                        Đang hoạt động
                    </span>
                </td>

                <td>
                    <a href="#" class="edit-btn">Sửa</a>
                    <a href="#" class="delete-btn">Xóa</a>
                </td>
            </tr>

            <tr>
                <td>DV003</td>
                <td>Giặt ủi</td>
                <td>Tiện ích</td>
                <td>80.000đ</td>

                <td>
                    <span class="inactive">
                        Tạm ngưng
                    </span>
                </td>

                <td>
                    <a href="#" class="edit-btn">Sửa</a>
                    <a href="#" class="delete-btn">Xóa</a>
                </td>
            </tr>

            <tr>
                <td>DV004</td>
                <td>Thuê xe sân bay</td>
                <td>Tiện ích</td>
                <td>300.000đ</td>

                <td>
                    <span class="active">
                        Đang hoạt động
                    </span>
                </td>

                <td>
                    <a href="#" class="edit-btn">Sửa</a>
                    <a href="#" class="delete-btn">Xóa</a>
                </td>
            </tr>

        </table>

    </div>

    <!-- RIGHT : FORM -->
    <div id="serviceForm" class="service-form">

        <h3>Thêm dịch vụ</h3>

        <div class="form-group">
            <label>Tên dịch vụ</label>
            <input type="text">
        </div>

        <div class="form-group">
            <label>Loại dịch vụ</label>

            <select>
                <option>Ăn uống</option>
                <option>Giải trí</option>
                <option>Tiện ích</option>
            </select>
        </div>

       <div class="form-group">
    <label>Giá dịch vụ</label>

    <select>
        <option>50.000đ</option>
        <option>80.000đ</option>
        <option>100.000đ</option>
        <option>150.000đ</option>
        <option>250.000đ</option>
        <option>300.000đ</option>
        <option>500.000đ</option>
    </select>
</div>

        <div class="form-group">
            <label>Trạng thái</label>

            <select>
                <option>Đang hoạt động</option>
                <option>Tạm ngưng</option>
            </select>
        </div>

        <button class="save-btn">
            Lưu dịch vụ
        </button>

    </div>

</div>
<script>

function toggleForm(){

    const layout = document.getElementById("serviceLayout");
    const form = document.getElementById("serviceForm");

    layout.classList.toggle("show-form");

}

</script>
</body>
</html>
