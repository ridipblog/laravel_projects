<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Message</title>
</head>
<p id="data"></p>
<button id="btn">Sent</button>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#btn', function() {
                $.ajax({
                    type: 'GET',
                    url: '/sent_test_message',
                    success: function(result) {
                        console.log(result.message);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            })
        })
        Echo.channel('testDataChannel').listen('TestData', (e) => {
            $('#data').html($('#data').html() + e.data);
        });
    </script>
</body>

</html>