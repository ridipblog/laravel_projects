<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact From</title>
    <script src="https://unpkg.com/htmx.org@1.9.5"
        integrity="sha384-xcuj3WpfgjlKF+FXhSQFQ0ZNr39ln+hwjN3npfM9VBnUskLolQAcN80McRIVOPuO" crossorigin="anonymous" defer>
    </script>
</head>

<body>
    <div id="response">

    </div>
    <div class="htmx-indicator" id="indicator">Loading</div>
    <form action="post" hx-post="/api/contact" hx-target="#response" hx-swal="innerHTML" hx-indicator="#indicator">
        @csrf
        <p>Your Name: </p>
        <input type="text" name="name">
        <p>Your Email</p>
        <input type="text" name="email">
        <button>Submit</button>
    </form>
</body>

</html>
