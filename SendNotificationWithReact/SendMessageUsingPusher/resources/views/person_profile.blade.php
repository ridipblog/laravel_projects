<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- <p>{{ Auth::user() }}sasa</p> --}}

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var json_data = '<?php echo json_encode($name); ?>';
        var json_obj_data = JSON.parse(json_data);
        console.log(json_obj_data);
        console.log(typeof(json_obj_data));
        // Echo.private('one-to-one-message').listen('PrivateMessageEvent', (e) => {
        //     console.log(e);
        // })
        Echo.channel('allUserMessage.' + json_obj_data).listen('AllUserMessageEvent', (e) => {
            // $('#data').html($('#data').html() + e.data);
            console.log(e.data);
        });
    </script>
</body>

</html>
