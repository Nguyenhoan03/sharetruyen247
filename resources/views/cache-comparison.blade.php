<!DOCTYPE html>
<html>
<head>
    <title>Cache Comparison: File vs Redis</title>
</head>
<body>
    <h1>Cache Comparison: File vs Redis</h1>
    <table border="1">
        <tr>
            <th>Cache Type</th>
            <th>First Run (seconds)</th>
            <th>Second Run (seconds)</th>
        </tr>
        @foreach ($results as $type => $times)
        <tr>
            <td>{{ ucfirst($type) }}</td>
            <td>{{ number_format($times['first_run'], 6) }}</td>
            <td>{{ number_format($times['second_run'], 6) }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>