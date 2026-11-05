
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f4f8;
            padding: 40px;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }
        input, button {
            padding: 10px;
            margin: 7px 0;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
        }
        table {
            width: 100%;
            margin-top: 25px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Student Management System</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Student Name" value="{{ old('name') }}" required>

        <input type="email" name="email" placeholder="Student Email" value="{{ old('email') }}" required>

        <input type="text" name="major" placeholder="Student Major" value="{{ old('major') }}">

        <button type="submit">Add Student</button>
    </form>

    <h3>Students List</h3>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
        </tr>

        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->major }}</td>
        </tr>
        @endforeach
    </table>
</div>

</body>
</html>
