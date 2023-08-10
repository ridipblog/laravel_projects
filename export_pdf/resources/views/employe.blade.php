<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css" media="all">
        body {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        p {
            width: 45%;
            text-align: center;
            color: red;
            font-size: 20px;
            font-weight: bold;
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
    <title>{{ $title }}</title>
</head>

<body>
    @foreach ($employes as $employe)
        <p>{{ $employe->emp_code }}</p>
        <p>{{ $employe->employe_name }}</p>
    @endforeach
</body>

</html>
