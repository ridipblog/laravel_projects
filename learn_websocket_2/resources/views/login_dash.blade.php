<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script src="{{ asset('js/app.js') }}"></script>

<body>
    <script>
        Echo.private('privent_text').listen('PriventMessage', (e) => {
            {{-- document.getElementById('data').innerHTML = e.message; --}}
            console.log(e.message);
        });
    </script>
</body>

</html>