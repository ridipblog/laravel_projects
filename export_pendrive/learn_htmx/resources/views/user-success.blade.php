@if ($check == false)
    @foreach ($message as $mes)
        <p>{{ $mes }}</p>
    @endforeach
@endif
<p>Send Success</p>
<div>
    @foreach ($users as $employe)
        <p>{{ $employe->name }}</p>
        <p>{{ $employe->email }}</p>
    @endforeach
</div>
