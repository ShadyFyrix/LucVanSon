<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Sửa Nhà Cung Cấp</title>
</head>
<body>
    <header class="container my-3">
        <h1>Sửa Nhà Cung Cấp</h1>
    </header>
    <section class="container my-3 border p-2">
        <form action="{{ route('ncc.update', $ncc->lvs_MaNCC) }}" method="POST">
            @csrf
            @method('PUT')     
            <div class="mb-3">
                <label for="lvs_TenNCC" class="form-label">Tên NCC</label>
                <input type="text" class="form-control" id="lvs_TenNCC" name="lvs_TenNCC" value="{{ old('lvs_TenNCC', $ncc->lvs_TenNCC) }}">
            </div>
            <div class="mb-3">
                <label for="lvs_Diachi" class="form-label">Địa Chỉ</label>
                <input type="text" class="form-control" id="lvs_Diachi" name="lvs_Diachi" value="{{ old('lvs_Diachi', $ncc->lvs_Diachi) }}">
            </div>
            <div class="mb-3">
                <label for="lvs_Dienthoai" class="form-label">Điện Thoại</label>
                <input type="text" class="form-control" id="lvs_Dienthoai" name="lvs_Dienthoai" value="{{ old('lvs_Dienthoai', $ncc->lvs_Dienthoai) }}">
            </div>        
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('ncc.index') }}" class="btn btn-secondary">Quay Lại</a>
        </form>
    </section>
</body>
</html>
