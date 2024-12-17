<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Nhà Cung Cấp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Danh Sách Nhà Cung Cấp</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã NCC</th>
                    <th>Tên NCC</th>
                    <th>Địa Chỉ</th>
                    <th>Điện Thoại</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nccs as $key => $ncc)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $ncc->lvs_MaNCC }}</td>
                        <td>{{ $ncc->lvs_TenNCC }}</td>
                        <td>{{ $ncc->lvs_Diachi }}</td>
                        <td>{{ $ncc->lvs_Dienthoai }}</td>
                        <td>
                            <a href="{{ route('ncc.detail', $ncc->lvs_MaNCC) }}" class="btn btn-info">Xem</a>
                            <a href="{{ route('ncc.edit', $ncc->lvs_MaNCC) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('ncc.delete', $ncc->lvs_MaNCC) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')  <!-- Change POST to DELETE -->
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('ncc.create') }}" class="btn btn-primary">Thêm Mới</a>
        <div class="d-flex justify-content-center">
            {{ $nccs->links() }}
        </div>
    </div>
</body>
</html>
