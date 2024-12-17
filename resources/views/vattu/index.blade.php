<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Vật Tư</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Danh Sách Vật Tư</h1>
        <a href="{{ route('vattu.create') }}" class="btn btn-primary mb-3">Thêm Mới Vật Tư</a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã Vật Tư</th>
                    <th>Tên Vật Tư</th>
                    <th>Đơn Vị Tính</th>
                    <th>Phần Trăm</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vattus as $key => $vattu)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $vattu->lvs_Mavtu }}</td>
                    <td>{{ $vattu->lvs_TenVtu }}</td>
                    <td>{{ $vattu->lvs_Dvtinh }}</td>
                    <td>{{ $vattu->lvs_Phantram }}%</td>
                    <td>
                        <a href="{{ route('vattu.detail', $vattu->lvs_Mavtu) }}" class="btn btn-info">Xem</a>
                        <a href="{{ route('vattu.edit', $vattu->lvs_Mavtu) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('vattu.delete', $vattu->lvs_Mavtu) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $vattus->links() }}
        </div>
    </div>
</body>
</html>
