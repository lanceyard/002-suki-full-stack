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
        Laporan Penjualan <br>
        Periode {{$date1}} s/d {{$date2}}
    </h3>
</div>
<h4>Order Product</h4>
<table id="customers">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Tgl. Transaksi</th>
            <th>Tgl. Selesai</th>
            <th>Daftar Produk</th>
            <th>Qty</th>
            <th>Subtotal</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orderList as $data)
            <tr>
                <td>{{$loop->iteration + $orderList->firstItem() - 1}}</td>
                <td>{{$data->users['name']}}</td>
                <td>{{$data->tgl_transaksi}}</td>
                <td>{{$data->tgl_selesai}}</td>
                <td>
                    @foreach ($data->products as $item)
                        {{$item->name}}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($data->products as $item)
                        {{$item->pivot->qty}}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($data->products as $item)
                        {{"Rp " . number_format($item->pivot->sub_total, 0, ".", '.')}}<br>
                    @endforeach
                </td>
                <td>{{"Rp " . number_format($data->total_harga, 0, ".", '.')}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4>Order Custom</h4>
<table id="customers">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Tgl. Transaksi</th>
            <th>Tgl. Selesai</th>
            <th>Produk Custom</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customList as $data)
            <tr>
                <td>{{$loop->iteration + $orderList->firstItem() - 1}}</td>
                <td>{{$data->users['name']}}</td>
                <td>{{$data->tgl_transaksi}}</td>
                <td>{{$data->tgl_selesai}}</td>
                <td>
                    @foreach ($data->customs as $item)
                        {{$item->name}}<br>
                    @endforeach
                </td>
                <td>{{"Rp " . number_format($data->total_harga, 0, ".", '.')}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
