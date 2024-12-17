<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Vật Tư</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Thêm Mới Vật Tư</h1>
        <form action="{{ route('vattu.createSubmit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="lvs_Mavtu" class="form-label">Mã Vật Tư</label>
                <input type="text" class="form-control" name="lvs_Mavtu" required>
            </div>
            <div class="mb-3">
                <label for="lvs_TenVtu" class="form-label">Tên Vật Tư</label>
                <input type="text" class="form-control" name="lvs_TenVtu" required>
            </div>
            <div class="mb-3">
                <label for="lvs_Dvtinh" class="form-label">Đơn Vị Tính</label>
                <input type="text" class="form-control" name="lvs_Dvtinh" required>
            </div>
            <div class="mb-3">
                <label for="lvs_Phantram" class="form-label">Phần Trăm</label>
                <input type="number" class="form-control" name="lvs_Phantram" required>
            </div>
            <button type="submit" class="btn btn-success">Thêm</button>
            <a href="{{ route('vattu.index') }}" class="btn btn-secondary">Quay Lại</a>
        </form>
    </div>
</body>
</html>
