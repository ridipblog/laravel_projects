<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>



</head>

<body>
    <div id="chat_data">

    </div>
    <div class="chat_input">
        <input type="text" id="chatInput">
        <button id="send">Send</button>
    </div>
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js"
        integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let ip_address = "127.0.0.1";
            let socket_port = "3000";
            let socket = io(ip_address + ':' + socket_port);
            $('#send').on('click', function() {
                let message = $('#chatInput').val();
                console.log(message);
                socket.emit('sendChatToServer', message);
                $('#chatInput').val('');

            })
            socket.on('sendChatToServer', (message) => {
                $('#chat_data').append(message);
            })
        })
    </script>
</body>

</html>
