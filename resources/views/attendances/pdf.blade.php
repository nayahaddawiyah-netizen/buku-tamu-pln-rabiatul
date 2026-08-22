<!DOCTYPE html>
<html>
<head>
    <title>Laporan Attendance</title>

    <style>
        body{
            font-family: sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:10px;
            text-align:left;
        }

        h1{
            text-align:center;
        }
    </style>

</head>
<body>

    <h1>Laporan Attendance</h1>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tamu</th>
                <th>Tujuan</th>
                <th>Tanggal</th>
            </tr>
        </thead>

        <tbody>

            @foreach($attendances as $attendance)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $attendance->guest_name }}</td>
                <td>{{ $attendance->purpose }}</td>
                <td>{{ $attendance->visit_date }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>