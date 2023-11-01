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
        Laporan Product <br>
        {{date('Y-m-d')}}
    </h3>
</div>
<br>
<table id="customers">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productList as $data)
            <tr>
                <td>{{$loop->iteration + $productList->firstItem() - 1}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->harga}}</td>
                <td>{{$data->qty}}</td>
                <td>{{$data->categories}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
