<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($employees as $employee)
    <p style="color: red;">{{ $employee->name }}</p>
    <p>{{ $employee->email }}</p>
    @endforeach
</body>

</html>