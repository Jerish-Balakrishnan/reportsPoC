<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report PDF</title>
    <style>
    .page-break {
        page-break-after: always;
    }
    </style>
</head>
<body>
    <h2>Report</h2>
    <table border="1px" style="width:100%;table-layout:fixed;border-collapse: collapse;">
        <thead>
            <tr>
                <th style="width:10%;">ID</th>
                <th style="width:20%;">First Name</th>
                <th style="width:20%;">Last Name</th>
                <th style="width:20%;">Mobile</th>
                <th style="width:30%;">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                <td style="width:10%;word-wrap:break-word;word-break:break-all;">{{ $row->id }}</td>
                <td style="width:20%;word-wrap:break-word;word-break:break-all;">{{ $row->firstname }}</td>
                <td style="width:20%;word-wrap:break-word;word-break:break-all;">{{ $row->lastname }}</td>
                <td style="width:20%;word-wrap:break-word;word-break:break-all;">{{ $row->mobile }}</td>
                <td style="width:30%;word-wrap:break-word;word-break:break-all;">{{ $row->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
