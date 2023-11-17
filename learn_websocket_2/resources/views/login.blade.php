<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="/registration" method="post">
        @csrf
        <input type="text" name="name">
        <input type="email" name="email">
        <input type="password" name="password">
        <button type="submit">Register</button>
    </form>
    <form action="/login" method="post">
        @csrf
        <input type="email" name="email">
        <input type="password" name="password">
        <button type="type">Login</button>
    </form>
</body>

</html>
