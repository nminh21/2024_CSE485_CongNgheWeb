<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<title>Cập nhật Vấn Đề</title>
<style>
    body {
        background-color: #f8f9fc;
        font-family: 'Roboto', sans-serif;
    }

    .form-container {
        max-width: 800px;
        margin: 50px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        font-size: 24px;
        font-weight: 600;
        color: #4e73df;
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 500;
        color: #5a5c69;
    }

    .btn-primary {
        background-color: #4e73df;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 16px;
    }

    .btn-primary:hover {
        background-color: #375a7f;
    }

    .btn-secondary {
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 16px;
    }
</style>
</head>
<body>
    <div class="form-container">
        <h1 class="form-title">Cập nhật Vấn Đề</h1>
        <div class="alert alert-primary">
            Bạn đang chỉnh sửa vấn đề có mã: <strong>{{ $issue->id }}</strong>
        </div>
        <form action="{{ route('issues.update', $issue->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="computer_id" class="form-label">Mã máy tính</label>
                <select class="form-select" id="computer_id" name="computer_id" required>
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}" {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>
                            {{ $computer->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="reported_by" class="form-label">Người báo cáo sự cố</label>
                <input type="text" class="form-control" id="reported_by" name="reported_by" value="{{ $issue->reported_by }}" required>
            </div>

            <div class="mb-3">
                <label for="reported_date" class="form-label">Thời gian báo cáo</label>
                <input type="datetime-local" class="form-control" id="reported_date" name="reported_date" value="{{ $issue->reported_date }}" step="1" min="0000-01-01T00:00:00" max="9999-12-31T23:59:59" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả sự cố</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $issue->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="urgency" class="form-label">Mức độ sự cố</label>
                <select class="form-select" id="urgency" name="urgency" required>
                    <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái hiện tại</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('issues.index') }}" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </div>
</body>
</html>
