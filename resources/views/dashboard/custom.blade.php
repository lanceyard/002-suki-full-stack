@extends('../layouts.mainlayout')

@section('title', 'Customs')

@section('aside')
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-0 fixed-start ms-0 my-lg-0 ms-lg-0 my-md-0 ms-md-0 my-sm-0 ms-sm-0 my-xl-3 ms-xl-4" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="./dashboard">
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
                    <a class="nav-link" href="/order">
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
                    <a class="nav-link active" href="/custom">
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
                <form class="row gx-4 dropdown col-auto" action="" method="get">
                    <div class="dropdown col-auto col-auto">
                        <a href="/custom" class="btn bg-gradient-dark btn-sm ms-auto px-3 my-1" type="submit">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="dropdown col-auto">
                        <button class="btn btn-sm bg-gradient-dark dropdown-toggle mb-1 px-3 my-1" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item" value="Pending" name="keyword" type="submit">Pending</button>
                            <button class="dropdown-item" value="Disetujui" name="keyword" type="submit">Disetujui</button>
                            <button class="dropdown-item" value="Pengerjaan" name="keyword" type="submit">Pengerjaan</button>
                            <button class="dropdown-item" value="Selesai" name="keyword" type="submit">Selesai</button>
                        </ul>
                    </div>
                    <div class="dropdown col-auto">
                        <button class="btn btn-sm bg-gradient-dark dropdown-toggle mb-1 px-3 my-1" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Jenis Custom
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item" value="Kursi" name="keyword" type="submit">Kursi</button>
                            <button class="dropdown-item" value="Pagar" name="keyword" type="submit">Pagar</button>
                            <button class="dropdown-item" value="Meja" name="keyword" type="submit">Meja</button>
                            <button class="dropdown-item" value="Pintu" name="keyword" type="submit">Pintu</button>
                            <button class="dropdown-item" value="Kanopi" name="keyword" type="submit">Kanopi</button>
                            <button class="dropdown-item" value="Rak" name="keyword" type="submit">Rak</button>
                            <button class="dropdown-item" value="Lemari" name="keyword" type="submit">Lemari</button>
                        </ul>
                    </div>
                    <div class="dropdown col-auto">
                        <button class="btn btn-sm bg-gradient-dark dropdown-toggle mb-1 px-3 my-1" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Bahan
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item" value="Kayu" name="keyword" type="submit">Kayu</button>
                            <button class="dropdown-item" value="Stainless" name="keyword" type="submit">Stainless</button>
                            <button class="dropdown-item" value="Baja_Ringan" name="keyword" type="submit">Baja Ringan</button>
                            <button class="dropdown-item" value="Kaca" name="keyword" type="submit">Kaca</button>
                        </ul>
                    </div>
                </form>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 me-sm-0 mx-auto mt-sm-3 mt-lg-0 mt-md-0 mt-3">
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
                <h6>Customs table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Custom No.
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('status', 'Status')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('name', 'Nama Custom')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('jenis_custom', 'Jenis Custom')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('bahan', 'Bahan')
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            @sortablelink('DP', 'Uang Muka')
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
                                @elseif ($data->status == "Pengerjaan")
                                        <span class="badge badge-sm bg-gradient-primary w-100">Pengerjaan</span>
                                @elseif ($data->status == "Disetujui")
                                        <span class="badge badge-sm bg-gradient-info w-100">Disetujui</span>
                                @elseif ($data->status == "Selesai")
                                        <span class="badge badge-sm bg-gradient-success w-100">Selesai</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$data->name}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold text-truncate">{{$data->jenis_custom}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold text-truncate">{{$data->bahan}}</span>
                            </td>
                            @if ($data->dp == null)
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold text-truncate">On Progress</span>
                                </td>
                            @else
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{"Rp " . number_format($data->dp, 0, ".", '.')}}</span>
                                </td>
                            @endif
                            <td class="align-middle text-center text-sm ms-auto">
                                <a data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id}}">
                                    <i class="fas fa-eye text-green-300 pe-2"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="align-middle text-center mt-3">Custom tidak ditemukan!</td>
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
                <div class="modal fade" id="detailModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Detail Custom</h4>
                        <a type="button" data-bs-dismiss="modal" aria-label="Close">
                            <b>X</b>
                        </a>
                        </div>
                        <div class="modal-body">
                            <span class="font-weight-bold">Customer :</span> {{$item->transactions->users['name']}} <br>
                            <span class="font-weight-bold">Tanggal transaksi :</span> {{$item->transactions->tgl_transaksi}} <br>
                            <span class="font-weight-bold">Alamat pengiriman :</span> {{$item->transactions->alamat}} <br>
                            <span class="font-weight-bold">Deskripsi :</span> {{$item->desc}}
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End Detail Modal -->
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
