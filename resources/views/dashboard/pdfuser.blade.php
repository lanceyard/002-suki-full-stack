<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: gray;
        color: white;
        }
    </style>
    <title>Report | {{date('Y-m-d')}}</title>
</head>
<body>

<div style="text-align: center">
    <h3>
        PT. Sumber Rejeki II <br>
        Laporan Pengguna <br>
        {{date('Y-m-d')}}
    </h3>
</div>
<br>
<table id="customers">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No. Telepon</th>
            <th>Username</th>
            <th>Email</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userList as $data)
            <tr>
                <td>{{$loop->iteration + $userList->firstItem() - 1}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->address}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
