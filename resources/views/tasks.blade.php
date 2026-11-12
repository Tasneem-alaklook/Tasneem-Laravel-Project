<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks Management</title>
    <!-- يمكنك إضافة روابط Bootstrap هنا لتنسيق الجدول والنموذج -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2 class="mb-4">إدارة المهام (Tasks Management)</h2>

    <!-- جدول عرض المهام -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>
                        <!-- زر التعديل لكل مهمة -->
                        <form action="{{ url('/edit/' . $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-info btn-sm">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr class="my-4">

    <!-- نموذج الإضافة أو التحديث بناءً على الشرط -->
    @if(isset($task))
        <!-- فورم التحديث (Update) -->
        <form action="{{ url('/update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $task->id }}">
            <div class="mb-3">
                <label class="form-label">Update Task</label>
                <input type="text" name="name" class="form-control" value="{{ $task->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    @else
        <!-- فورم الإضافة العادي (Create) -->
        <form action="{{ url('/students') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">New Task</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Task</button>
        </form>
    @endif

</body>
</html>
