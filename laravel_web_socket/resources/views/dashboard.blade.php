<!DOCTYPE html>
<html lang="en">

<head>
    <title>Notification with Voice</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>

    <a href="/logout" style="float: right">Logout</a>

    {{-- tone --}}
    <audio id="myAudio">
        <source src="{{asset('tone/tone.mp3')}}" type="audio/mpeg">
    </audio>
    {{-- tone --}}

    <h3 style="color: grey" id="notification"></h3>

    <h4>Hii {{ auth()->user()->name }}</h4>

    <form action="" id="notificationForm">
        @csrf
        <input type="text" name="message" placeholder="Enter Text" id="notification-text" required>
        <br><br>
        <input type="submit" value="Send Notification">
        <p style="color:green" id="notificationSend"></p>
    </form>

    <script>
        var x = document.getElementById("myAudio");

    function enableAutoplay() {
        x.autoplay = true;
        x.load();
    }

    var userId = "{{auth()->user()->id}}";
    $(document).ready(function(){

        $('#notificationForm').submit(function(e){
            e.preventDefault();
            var formData = $(this).serialize();
            $(this)[0].reset();
            $.ajax({
                url:"{{ route('send-notification') }}",
                type:"POST",
                data:formData,
                success:function(res){
                    if(res.success){
                        $('#notificationSend').text(res.msg);
                    }
                    else{
                        alert(res.msg);
                    }

                    setTimeout(() => {
                        $('#notificationSend').text('');
                    }, 2000);
                }
            });
        });

    });


    Echo.channel('notify-channel')
    .listen('SendNotification', (e) => {
        if(userId != e.userId){
            enableAutoplay();
            $('#notification').text(e.message);
        }
    });

    </script>


</body>

</html>