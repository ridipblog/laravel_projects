<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel('allUserMessage').listen('AllUserMessageEvent', (e) => {
            // $('#data').html($('#data').html() + e.data);
            console.log(e.data);
        });
    </script>
</body>

</html>
