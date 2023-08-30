<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <button id="btn">Clicked</button>
    <div id="div">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn').on('click', function() {
                $.ajax({
                    type: "get",
                    url: "/temp-related-get",
                    datatype: "html",
                    beforeSend: function() {
                        console.log("Loading");
                    }
                }).done(function(result) {
                    $('#div').html(result);
                })
            })
        })
    </script>
</body>

</html>
