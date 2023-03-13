<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($plans as $row)
            <tr>
                <td>{{ $row['id'] }}</td>
                <td>{{ $row['name'] }}</td>
                <td>{{ $row['email'] }}</td>
                <td>{!! html_entity_decode($row['details']) !!}</td>
            </tr>
        @endforeach
    </tbody>
</table>