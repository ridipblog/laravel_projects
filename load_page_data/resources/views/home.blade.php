<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>

    </style>
</head>

<body>
    <div id="show_data">

    </div>
    <div id="loader" style="display: none;">
        <h1>Loader</h1>
    </div>
    <button id="get_data">Get Data</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#get_data').on('click', function() {

                $.ajax({
                    type: 'get',
                    url: '/blogs',
                    datatype: 'html',
                    beforeSend: function() {
                        $('#loader').css('display', 'block')
                    }
                }).done(function(result) {
                    if (result.length == 0) {
                        $('#loader').append('<h1>No Data </h1>');
                        return;
                    }
                    $('#loader').css('display', 'none');
                    $('#show_data').append(result);
                })
            })
        })
    </script>
</body>

</html>
