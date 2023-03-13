<table>
    @foreach ($plans as $row)
        @foreach ($row as $value)
        <tr>
            <td>{{ $value }}</td>
        </tr>        
        @endforeach        
    @endforeach
</table>