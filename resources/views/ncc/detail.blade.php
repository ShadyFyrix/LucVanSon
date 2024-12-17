<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Nhà Cung Cấp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Chi Tiết Nhà Cung Cấp</h1>
        <table class="table table-bordered">
            <tr>
                <th>Mã NCC</th>
                <td>{{ $ncc->lvs_MaNCC }}</td>
            </tr>
            <tr>
                <th>Tên NCC</th>
                <td>{{ $ncc->lvs_TenNCC }}</td>
            </tr>
            <tr>
                <th>Địa Chỉ</th>
                <td>{{ $ncc->lvs_Diachi }}</td>
            </tr>
            <tr>
                <th>Điện Thoại</th>
                <td>{{ $ncc->lvs_Dienthoai }}</td>
            </tr>
        </table>
        <a href="{{ route('ncc.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
</body>
</html>
