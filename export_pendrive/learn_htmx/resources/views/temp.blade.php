@if ($method === 'ajax')
    @foreach ($employes as $employe)
        <p>{{ $employe->name }}</p>
        <p>{{ $employe->email }}</p>
    @endforeach
@endif
{{ $method }}
