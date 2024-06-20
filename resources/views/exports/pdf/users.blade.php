<!DOCTYPE html>

<html>

<head>
    <title>Laporan - Daftar Pengguna Aplikasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        .center {
            text-align: center;
        }

        .full {
            width: 100%;
        }

        .wrapper {
            padding-left: 30px;
            padding-right: 30px;
        }

        .kanan {
            float: right;
            display: block;
            width: 200px;
        }

        .kiri {
            float: left;
            display: block;
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="center">
        <div>
            <h3>Tabel Daftar Pengguna Aplikasi</h3>
        </div>
    </div>
    <table class="table table-striped" id="tableDT" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th style="white-space: nowrap;">Nama Pengguna</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['username'] }}</td>
                    <td>{{ $data['email'] }}
                    <td>{{ $data['phone'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
