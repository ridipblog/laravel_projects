<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get Api</title>
</head>

<body>
    <p class="name"></p>
    <p class="roll"></p>
    <button id="post_data">Post Data</button>
    <button id="get_data">Get Data</button>
    <button id="find_data">Find Data</button>
    <button id="update_data">Update Data</button>

    <script script script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#get_data').on('click', async function() {
            const response = await fetch('http://localhost:8000/api/employe/');
            var data = await response.json();
            console.log(data[0].name);
        })
        $('#post_data').on('click', async function() {
            $.ajax({
                type: "post",
                url: "http://localhost:8000/api/employe/",
                data: {
                    name: 'coder 4',
                    roll: 1234
                },
                success: function(result) {
                    console.log(result);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        $('#find_data').on('click', async function() {
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/api/employe/2',
                success: function(result) {
                    console.log(result[0].name);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        $('#update_data').on('click', async function() {
            $.ajax({
                type: 'GET',
                url: 'http://localhost:8000/api/employe/3',
                data: {
                    name: 'coder 3',
                    roll: 1233
                },
                success: function(result) {
                    console.log(result);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
</body>

</html>
