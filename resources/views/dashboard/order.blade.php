@extends('../layouts.mainlayout')

@section('title', 'Orders')

@section('aside')
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-0 fixed-start ms-0 my-lg-0 ms-lg-0 my-md-0 ms-md-0 my-sm-0 ms-sm-0 my-xl-3 ms-xl-4" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/dashboard">
                <img src="{{asset('/images/icon.png')}}" class="navbar-brand-img h-100" alt="main_logo" />
                <span class="ms-1 font-weight-bold">Suki Dashboard</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0" />
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-television text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/order">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-shopping-cart text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Transactions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-shopping-bag text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/custom">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-archive text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Customs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-user-circle text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/report">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-pie-chart text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Report</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@endsection

@section('action')
    <div class="card shadow-lg mx-4 mt-3">
        <div class="card-body">
            <div class="row gx-4">
                <form class="row gx-4 dropdown col-auto" action="/order" method="get">
                    <div class="dropdown col-auto">
                        <a href="/order" class="btn bg-gradient-dark btn-sm ms-auto px-3 my-1" type="submit">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="dropdown col-auto">
                        <button class="btn btn-sm bg-gradient-dark dropdown-toggle mb-1 px-3 my-1" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item" value="Pending" name="keyword" type="submit">Pending</button>
                            <button class="dropdown-item" value="Belum_Bayar" name="keyword" type="submit">Belum Bayar</button>
                            <button class="dropdown-item" value="Menunggu_Konfirmasi" name="keyword" type="submit">Menunggu Konfirmasi</button>
                            <button class="dropdown-item" value="Terkonfirmasi" name="keyword" type="submit">Terkonfirmasi</button>
                            <button class="dropdown-item" value="Dikirim" name="keyword" type="submit">Dikirim</button>
                            <button class="dropdown-item" value="Selesai" name="keyword" type="submit">Selesai</button>
                        </ul>
                    </div>
                </form>
                <div class="col-lg-4 col-md-6 col-sm-7 col-12 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <div class="ms-md-auto d-flex align-items-center">
                            <form class="input-group" action="" method="get">
                                <div class="input-group">
                                <input type="text" class="form-control" name="keyword" placeholder="Type here..." aria-label="Type here..." aria-describedby="button-addon2">
                                <button class="btn bg-gradient-dark  mb-0" type="submit" name="caridata" id="button-addon2">
                                    <i class="fas fa-search" aria-hidden="true"></i>
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <h6>Transactions product table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                @if(Session::has('statusOrder'))
                    <div class="alert alert-success ms-1 my-3 font-weight-bold" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Order No.
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('status', 'Status')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('users.name', 'Customer')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('total_harga', 'Total Harga')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('tgl_transaksi', 'Tanggal Transaksi')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('tgl_selesai', 'Tanggal Selesai')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (count($orderList) > 0)
                            @foreach ($orderList as $data)
                            <tr>
                                <td class="align-middle text-center py-4">
                                    <span class="text-secondary text-xs font-weight-bold">{{$loop->iteration + $orderList->firstItem() - 1}}</span>
                                </td>
                                <td class="align-middle text-center text-sm pe-3">
                                    @if ($data->status == "Pending")
                                            <span class="badge badge-sm bg-gradient-warning w-100">Pending</span>
                                    @elseif ($data->status == "Belum_Bayar")
                                            <span class="badge badge-sm bg-gradient-danger w-100">B. Bayar</span>
                                    @elseif ($data->status == "Menunggu_Konfirmasi")
                                            <span class="badge badge-sm bg-gradient-primary w-100">M. Konfirmasi</span>
                                    @elseif ($data->status == "Terkonfirmasi")
                                            <span class="badge badge-sm bg-gradient-secondary w-100">Terkonfirmasi</span>
                                    @elseif ($data->status == "Dikirim")
                                            <span class="badge badge-sm bg-gradient-info w-100">Dikirim</span>
                                    @elseif ($data->status == "Selesai")
                                            <span class="badge badge-sm bg-gradient-success w-100">Selesai</span>   
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$data->users['name']}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold text-truncate">{{"Rp " . number_format($data->total_harga, 0, ".", '.')}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$data->tgl_transaksi}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">
                                        @if ($data->tgl_selesai != null)
                                            {{$data->tgl_selesai}}
                                        @else
                                            On Progress
                                        @endif
                                    </span>
                                </td>
                                <td class="align-middle text-center text-sm ms-auto">
                                    <form action="dtOrder/{{$data->id}}" method="get">
                                        <a data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id}}">
                                            <i class="fas fa-eye text-green-300 pe-2"></i>
                                        </a>
                                        @if ($data->status == "Pending")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalPending{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @elseif ($data->status == "Belum_Bayar")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalBB{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @elseif ($data->status == "Menunggu_Konfirmasi")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalMK{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @elseif ($data->status == "Terkonfirmasi")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalTerkonfirmasi{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @elseif ($data->status == "Dikirim")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalDikirim{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @elseif ($data->status == "Selesai")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalSelesai{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @endif
                                    </form>
                                </td>
                            </tr> 
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="align-middle text-center mt-3">Transaksi tidak ditemukan!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>
                <div class="my-4 d-flex justify-content-center">
                    {!! $orderList->appends(Request::except('page')) !!}
                </div>
            </div>
            @foreach ($orderList as $item)
                <!-- Detail Modal -->
                <div class="modal fade bd-example-modal-lg" id="detailModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Detail Order</h4>
                        <a type="button" data-bs-dismiss="modal" aria-label="Close">
                            <b>X</b>
                        </a>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex">
                                <div class="col-9">
                                    <span class="font-weight-bold">Customer :</span> {{$item->users->name}} <br>
                                    <span class="font-weight-bold">Alamat pengiriman :</span> {{$item->alamat}} <br>
                                    <span class="font-weight-bold">Total Pembayaran : </span> {{"Rp " . number_format($item->total_harga, 0, ".", '.')}} <br>
                                    <span class="font-weight-bold">Bukti Pembayaran :</span>
                                    @if ($item->bukti_bayar)
                                        <br><img src="{{ asset('storage/' . $item->bukti_bayar)}}" class="rounded" width="300px" alt="Bukti Pembayaran {{$item->name}}" /> <br>
                                    @else
                                        <span>-</span>
                                    @endif
                                </div>
                                <div class="col-3 text-end">
                                    {{\Carbon\Carbon::parse($item->tgl_transaksi)->format('D')}}, {{$item->tgl_transaksi}} <br>
                                    @if ($item->status == "Pending")
                                    <span class="badge badge-sm bg-gradient-warning">Pending</span> <br>
                                    @elseif ($item->status == "Belum_Bayar")
                                    <span class="badge badge-sm bg-gradient-danger">B. Bayar</span> <br>
                                    @elseif ($item->status == "Menunggu_Konfirmasi")
                                    <span class="badge badge-sm bg-gradient-primary">M. Konfirmasi</span> <br>
                                    @elseif ($item->status == "Terkonfirmasi")
                                    <span class="badge badge-sm bg-gradient-secondary">Terkonfirmasi</span> <br>
                                    @elseif ($item->status == "Dikirim")
                                    <span class="badge badge-sm bg-gradient-info">Dikirim</span> <br>
                                    @elseif ($item->status == "Selesai")
                                    <span class="badge badge-sm bg-gradient-success">Selesai</span> <br> 
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item->products as $list)
                                        <tr>
                                            <td><img src="{{ $list->image ? asset('storage/' . $list->image) : asset('/images/box.png') }}" class="rounded" width="50px" alt="{{$list->name}}" /></td>
                                            <td>{{$list->name}}</td>
                                            <td>{{"Rp " . number_format($list->harga, 0, ".", '.')}}</td>
                                            <td>{{$list->pivot->qty}}</td>
                                            <td>{{"Rp " . number_format($list->pivot->sub_total, 0, ".", '.')}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End Detail Modal -->

                <!-- Update Modal Pending -->
                <div class="modal fade bd-example-modal-md" id="updateModalPending{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info font-weight-bold" role="alert">User belum melakukan checkout.</div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal Pending -->

                <!-- Update Modal BB -->
                <div class="modal fade bd-example-modal-md" id="updateModalBB{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info font-weight-bold" role="alert">User belum melakukan pembayaran.</div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal BB -->

                <!-- Update Modal MK -->
                <div class="modal fade bd-example-modal-md" id="updateModalMK{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-success font-weight-bold" role="alert">Konfirmasi pembayaran?</div>
                        </div>
                        <div class="modal-footer">
                            <form action="/order-confirm/{{$item->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" >Update</button>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal MK -->

                <!-- Update Modal Terkonfirmasi -->
                <div class="modal fade bd-example-modal-md" id="updateModalTerkonfirmasi{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-success font-weight-bold" role="alert">Update status transaksi menjadi dikirim?</div>
                        </div>
                        <div class="modal-footer">
                            <form action="/order-send/{{$item->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" >Update</button>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal Terkonfirmasi -->

                <!-- Update Modal Dikirim -->
                <div class="modal fade bd-example-modal-md" id="updateModalDikirim{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info font-weight-bold" role="alert">Produk sedang dikirim ke alamat user.</div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal Dikirim -->

                <!-- Update Modal Selesai -->
                <div class="modal fade bd-example-modal-md" id="updateModalSelesai{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info font-weight-bold" role="alert">Produk sudah diterima oleh user, proses transaksi selesai.</div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal Selesai -->
            @endforeach
            </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <h6>Transactions custom table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                @if(Session::has('statusCustom'))
                    <div class="alert alert-success ms-1 my-3 font-weight-bold" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Order No.
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('status', 'Status')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('users.name', 'Customer')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('total_harga', 'Total Harga')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('tgl_transaksi', 'Tanggal Transaksi')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('tgl_selesai', 'Tanggal Selesai')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (count($customList) > 0)
                            @foreach ($customList as $data)
                            <tr>
                                <td class="align-middle text-center py-4">
                                    <span class="text-secondary text-xs font-weight-bold">{{$loop->iteration + $customList->firstItem() - 1}}</span>
                                </td>
                                <td class="align-middle text-center text-sm pe-3">
                                    @if ($data->status == "Pending")
                                            <span class="badge badge-sm bg-gradient-warning w-100">Pending</span>
                                    @elseif ($data->status == "Belum_Bayar")
                                            <span class="badge badge-sm bg-gradient-danger w-100">B. Bayar</span>
                                    @elseif ($data->status == "Menunggu_Konfirmasi")
                                            <span class="badge badge-sm bg-gradient-primary w-100">M. Konfirmasi</span>
                                    @elseif ($data->status == "Terkonfirmasi")
                                            <span class="badge badge-sm bg-gradient-secondary w-100">Terkonfirmasi</span>
                                    @elseif ($data->status == "Dikirim")
                                            <span class="badge badge-sm bg-gradient-info w-100">Dikirim</span>
                                    @elseif ($data->status == "Selesai")
                                            <span class="badge badge-sm bg-gradient-success w-100">Selesai</span>
                                    @elseif ($data->status == "Gagal")
                                            <span class="badge badge-sm bg-gradient-dark w-100">Gagal</span>   
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$data->users['name']}}</span>
                                </td>
                                @if ($data->total_harga == null)
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">On Progress</span>
                                    </td>
                                @else
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{"Rp " . number_format($data->total_harga, 0, ".", '.')}}</span>
                                    </td>
                                @endif
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$data->tgl_transaksi}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">
                                        @if ($data->tgl_selesai != null)
                                            {{$data->tgl_selesai}}
                                        @else
                                            On Progress
                                        @endif
                                    </span>
                                </td>
                                <td class="align-middle text-center text-sm ms-auto">
                                    <form action="dtOrder/{{$data->id}}" method="get">
                                        <a data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id}}">
                                            <i class="fas fa-eye text-green-300 pe-2"></i>
                                        </a>
                                        @if ($data->status == "Pending")
                                            @if ($data->total_harga == null)
                                                <a data-bs-toggle="modal" data-bs-target="#updateModalPending1{{$data->id}}">
                                                    <i class="fas fa-edit text-green-300"></i>
                                                </a>
                                            @else
                                                <a data-bs-toggle="modal" data-bs-target="#updateModalPending2{{$data->id}}">
                                                    <i class="fas fa-edit text-green-300"></i>
                                                </a>
                                            @endif
                                        @elseif ($data->status == "Belum_Bayar")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalBB{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @elseif ($data->status == "Menunggu_Konfirmasi")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalMK{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @elseif ($data->status == "Terkonfirmasi")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalTerkonfirmasi{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @elseif ($data->status == "Dikirim")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalDikirim{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @elseif ($data->status == "Selesai")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalSelesai{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @elseif ($data->status == "Gagal")
                                            <a data-bs-toggle="modal" data-bs-target="#updateModalGagal{{$data->id}}">
                                                <i class="fas fa-edit text-green-300"></i>
                                            </a>
                                        @endif
                                    </form>
                                </td>
                            </tr> 
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="align-middle text-center mt-3">Transaksi tidak ditemukan!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>
                <div class="my-4 d-flex justify-content-center">
                    {!! $customList->appends(Request::except('page')) !!}
                </div>
            </div>
            @foreach ($customList as $item)
                <!-- Detail Modal -->
                <div class="modal fade bd-example-modal-lg" id="detailModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Detail Order</h4>
                        <a type="button" data-bs-dismiss="modal" aria-label="Close">
                            <b>X</b>
                        </a>
                        </div>
                        <div class="modal-body">
                                <div class="row d-flex">
                                    <div class="col-9">
                                        <span class="font-weight-bold">Customer :</span> {{$item->users->name}} <br>
                                        <span class="font-weight-bold">Alamat pengiriman :</span> {{$item->alamat}} <br>
                                        <span class="font-weight-bold">Bukti Pembayaran :</span>
                                        @if ($item->bukti_bayar)
                                            <br><img src="{{ asset('storage/' . $item->bukti_bayar)}}" class="rounded" width="300px" alt="Bukti Pembayaran {{$item->name}}" /> <br>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </div>
                                    <div class="col-3 text-end">
                                        {{\Carbon\Carbon::parse($item->tgl_transaksi)->format('D')}}, {{$item->tgl_transaksi}} <br>
                                        @if ($item->status == "Pending")
                                        <span class="badge badge-sm bg-gradient-warning">Pending</span> <br>
                                        @elseif ($item->status == "Belum_Bayar")
                                        <span class="badge badge-sm bg-gradient-danger">B. Bayar</span> <br>
                                        @elseif ($item->status == "Menunggu_Konfirmasi")
                                        <span class="badge badge-sm bg-gradient-primary">M. Konfirmasi</span> <br>
                                        @elseif ($item->status == "Terkonfirmasi")
                                        <span class="badge badge-sm bg-gradient-secondary">Terkonfirmasi</span> <br>
                                        @elseif ($item->status == "Dikirim")
                                        <span class="badge badge-sm bg-gradient-info">Dikirim</span> <br>
                                        @elseif ($item->status == "Selesai")
                                        <span class="badge badge-sm bg-gradient-success">Selesai</span> <br> 
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle">
                                        <thead>
                                            <tr>
                                                <th>Custom</th>
                                                <th>Status</th>
                                                <th>DP</th>
                                                <th>Harga Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($item->customs as $list)
                                            <tr>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->status}}</td>
                                                <td>{{"Rp " . number_format($list->dp, 0, ".", '.')}}</td>
                                                <td>{{"Rp " . number_format($list->transactions->total_harga, 0, ".", '.')}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End Detail Modal -->

                <!-- Update Modal Pending 1 -->
                <div class="modal fade bd-example-modal-md" id="updateModalPending1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            Isi form berikut kemudian tekan tombol <b>Update</b> jika pesanan custom disetujui, jika tidak silahkan tekan tombol <b>Tolak</b>! <br><br>
                            <form action="/order-confirm-custom/{{$item->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="DP">Uang Muka</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text">Rp. </div>
                                        </div>
                                        <input type="number" class="form-control" name="DP" id="DP" required>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <label for="total_harga">Total Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text">Rp. </div>
                                        </div>
                                        <input type="number" class="form-control" name="total_harga" id="total_harga" required>
                                      </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-success me-2" >Update</button>
                                    </form>
                                    <form action="/order-tolak-custom/{{$item->id}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger" >Tolak</button>
                                    </form>
                                </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal Pending 1 -->

                <!-- Update Modal Pending 2 -->
                <div class="modal fade bd-example-modal-md" id="updateModalPending2{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info font-weight-bold" role="alert">Menunggu konfirmasi dari user.</div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal Pending 2 -->

                <!-- Update Modal Gagal -->
                <div class="modal fade bd-example-modal-md" id="updateModalGagal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger font-weight-bold" role="alert">Order custom ini sudah ditolak, apakah anda akan menghapusnya?</div>
                        </div>
                        <div class="modal-footer">
                            <form action="/order-custom-delete/{{$item->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal Gagal -->

                <!-- Update Modal BB -->
                <div class="modal fade bd-example-modal-md" id="updateModalBB{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info font-weight-bold" role="alert">User belum melakukan pembayaran.</div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal BB -->

                <!-- Update Modal MK -->
                <div class="modal fade bd-example-modal-md" id="updateModalMK{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-success font-weight-bold" role="alert">Konfirmasi pembayaran?</div>
                        </div>
                        <div class="modal-footer">
                            <form action="/order-custom-confirm/{{$item->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" >Update</button>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal MK -->

                <!-- Update Modal Terkonfirmasi -->
                <div class="modal fade bd-example-modal-md" id="updateModalTerkonfirmasi{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-success font-weight-bold" role="alert">Update status transaksi menjadi dikirim?</div>
                        </div>
                        <div class="modal-footer">
                            <form action="/order-custom-send/{{$item->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" >Update</button>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal Terkonfirmasi -->

                <!-- Update Modal Dikirim -->
                <div class="modal fade bd-example-modal-md" id="updateModalDikirim{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info font-weight-bold" role="alert">Produk sedang dikirim ke alamat user.</div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal Dikirim -->

                <!-- Update Modal Selesai -->
                <div class="modal fade bd-example-modal-md" id="updateModalSelesai{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <a type="button" data-bs-dismiss="modal" aria-label="Close">
                                <b>X</b>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info font-weight-bold" role="alert">Produk sudah diterima oleh user, proses transaksi selesai.</div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- End Update Modal Selesai -->
            @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection

@section('javascript')
    <script src="{{asset('js/core/popper.min.js')}}"></script>
    <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script>
    var win = navigator.platform.indexOf("Win") > -1;
    if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
        damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('js/argon-dashboard.min.js')}}"></script>
@endsection
