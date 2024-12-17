<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Vật Tư</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Chi Tiết Vật Tư</h1>
        <ul class="list-group">
            <li class="list-group-item"><strong>Mã Vật Tư:</strong> {{ $vattu->lvs_Mavtu }}</li>
            <li class="list-group-item"><strong>Tên Vật Tư:</strong> {{ $vattu->lvs_TenVtu }}</li>
            <li class="list-group-item"><strong>Đơn Vị Tính:</strong> {{ $vattu->lvs_Dvtinh }}</li>
            <li class="list-group-item"><strong>Phần Trăm:</strong> {{ $vattu->lvs_Phantram }}%</li>
        </ul>
        <a href="{{ route('vattu.index') }}" class="btn btn-secondary mt-3">Quay Lại</a>
    </div>
</body>
</html>
