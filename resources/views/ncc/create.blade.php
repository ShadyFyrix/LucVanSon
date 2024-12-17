<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhà Cung Cấp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Thêm Nhà Cung Cấp</h1>
        <form action="{{ route('ncc.createSubmit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="lvs_MaNCC" class="form-label">Mã NCC</label>
                <input type="text" class="form-control" name="lvs_MaNCC" required>
            </div>
            <div class="mb-3">
                <label for="lvs_TenNCC" class="form-label">Tên NCC</label>
                <input type="text" class="form-control" name="lvs_TenNCC" required>
            </div>
            <div class="mb-3">
                <label for="lvs_Diachi" class="form-label">Địa Chỉ</label>
                <input type="text" class="form-control" name="lvs_Diachi" required>
            </div>
            <div class="mb-3">
                <label for="lvs_Dienthoai" class="form-label">Điện Thoại</label>
                <input type="text" class="form-control" name="lvs_Dienthoai" required>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('ncc.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>
