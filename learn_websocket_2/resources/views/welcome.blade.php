<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>
        Real Time Data <span id="data"></span>
    </p>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        {{--  publich channel run  --}}
        {{--  Echo.channel('testDataChannel').listen('TestData',(e)=>{
        document.getElementById('data').innerHTML=e.data;
        });  --}}

        Echo.private('privent_text').listen('PriventMessage', (e) => {
            document.getElementById('data').innerHTML = e.message;
        });
    </script>
</body>

</html>
