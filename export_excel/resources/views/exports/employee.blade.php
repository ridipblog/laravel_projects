<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <tr>
        <td>Employee Name</td>
        <td>Employee Email</td>
    </tr>
    @foreach ($employees as $employee)
    <tr>
        <td style="width: 200px;">{{ $employee->name }}</td>
        <td>{{ $employee->email }}</td>
    </tr>
    @endforeach
</body>

</html>