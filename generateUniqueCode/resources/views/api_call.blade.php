<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form id="myForm">
        <input type="text" name="name">
        <input type="text" name="email">
        <button type="submit">Submit</button>
    </form>

    <div id="div_1">

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#myForm', function(event) {
                event.preventDefault();
                var form_data = new FormData($(this)[0]);
                axios.post('/api/post-data', form_data)
                    .then(response => {
                        console.log(response.data);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            })
            const params = {
                name: 'coder 1',
                email: 'coder1@gmail.com'
            };
            axios.get('/api/get-data', {
                    params
                })
                .then(response => {
                    console.log(response.data);
                    $('#div_1').html(response.data.message[2]);
                })
                .catch(error => {
                    console.log(error);
                });
        });
    </script>
</body>

</html>
