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
        <b>Trade: </b> <span id="trade-data"></span>
    </p>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel('trades').listen('NewTrade',(e)=>{
    document.getElementById('trade-data').innerHTML=e.trade;
    });
    </script>
</body>

</html>