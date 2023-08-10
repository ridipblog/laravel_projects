<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>

<body>

    <div class="container">
        <table id="users-table" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>

                </tr>
            </thead>
            <tbody>
                <!-- Populate the table rows using Laravel's Blade directives or loop -->
                @foreach ($users as $user)
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->block_name }}</td>
                    {{-- <td>{{ $user->email }}</td>
                    <td><a href="child/{{ $user->id }}">Check</a></td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable();
        });
    </script>
</body>

</html>
