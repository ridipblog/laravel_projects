<table>
    <thead>
        <tr>
            <th>Employe Code</th>
            <th>Employe Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->emp_code }}</td>
                <td>{{ $student->employe_name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
