@extends('../layouts.mainlayout')

@section('title', 'Report')

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
        <a class="nav-link active" href="/report">
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
          <form class="row gx-4 dropdown col-auto" action="/report-date" method="get">
              <div class="dropdown col-auto">
                  <a href="/report" class="btn bg-gradient-dark btn-sm ms-auto px-3 my-1" type="submit">
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                  </a>
              </div>
              <div class="dropdown col-auto">
                  <input class="form-control btn btn-sm bg-gradient-dark mb-1 px-3 my-1" value="{{ date('Y-m-d') }}" type="date" name="date1" id="date1" />
              </div>
              <div class="dropdown col-auto">
                  <input class="form-control btn btn-sm bg-gradient-dark mb-1 px-3 my-1" value="{{ date('Y-m-d') }}" type="date" name="date2" id="date2" />
              </div>
              <div class="dropdown col-auto">
                  <button class="btn bg-gradient-dark px-3 pt-2 pb-1 my-1" type="submit">
                    <i class="fa fa-filter" aria-hidden="true"></i>
                  </button>
              </div>
          </form>
        <div class="dropdown col-auto">
            <button class="btn bg-gradient-dark btn-sm ms-auto my-1" onclick="getInputValue()" data-bs-toggle="modal" data-bs-target="#exportModal">
                Export
            </button>
        </div>

        {{-- export modal --}}
        <div class="modal fade bd-example-modal-sm" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Export Report</h5>
                    <a type="button" data-bs-dismiss="modal" aria-label="Close">
                        <b>X</b>
                    </a>
                </div>
                <div class="modal-body d-flex">
                    <form class="mx-3" action="/report-pdf" method="get">
                        <input hidden class="form-control btn btn-sm bg-gradient-secondary mb-1 px-3 my-1" type="date" name="iDate1" id="i-date1" />
                        <input hidden class="form-control btn btn-sm bg-gradient-secondary mb-1 px-3 my-1" type="date" name="iDate2" id="i-date2" />
                        <button type="submit" class="btn bg-gradient-dark btn-sm ms-auto my-1">
                            <i class="fa fa-file-pdf-o me-1" aria-hidden="true"></i>
                            PDF
                        </button>
                    </form>
                    <form class="mx-3" action="/report-excel" method="get">
                        <input hidden class="form-control btn btn-sm bg-gradient-secondary mb-1 px-3 my-1" type="date" name="iDate3" id="i-date3" />
                        <input hidden class="form-control btn btn-sm bg-gradient-secondary mb-1 px-3 my-1" type="date" name="iDate4" id="i-date4" />
                        <button type="submit" class="btn bg-gradient-dark btn-sm ms-auto my-1">
                          <i class="fa fa-file-excel-o me-1" aria-hidden="true"></i>
                          Excel
                        </button>
                    </form>
                </div>
              </div>
            </div>
        </div>
        {{-- end export modal --}}
        
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 me-sm-0 mx-auto mt-sm-3 mt-lg-0 mt-md-3 mt-3">
            <div class="nav-wrapper position-relative end-0">
            <div class="ms-md-auto d-flex align-items-center">
                <form class="input-group" action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Type here..." aria-label="Type here..." aria-describedby="button-addon2">
                    <button class="btn bg-gradient-dark  mb-0" name="caridata" type="submit" id="button-addon2">
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

@section('action')
<div class="card shadow-lg mx-4 mt-3">
  <div class="card-body">
    <div class="row gx-4">
      <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
        <div class="nav-wrapper position-relative end-0">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <form class="input-group" action="" method="get">
              <div class="input-group">
                <input type="text" class="form-control ms-4" name="keyword" placeholder="Type here..." aria-label="Type here..." aria-describedby="button-addon2">
                <button class="btn bg-gradient-dark  mb-0" name="caridata" type="submit" id="button-addon2">
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
          <h6>Report product table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          @if(Session::has('status'))
          <div class="alert alert-danger ms-1 my-3 font-weight-bold" role="alert">
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
                    @sortablelink('users.name', 'Customer')
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    @sortablelink('tgl_transaksi', 'Tgl. Transaksi')
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    @sortablelink('tgl_selesai', 'Tgl. Selesai')
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Daftar Produk
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Qty
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Subtotal
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    @sortablelink('total_harga', 'Total Harga')
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
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$data->users['name']}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$data->tgl_transaksi}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$data->tgl_selesai}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold text-truncate text-left">
                        @foreach ($data->products as $item)
                        {{$item->name}}<br>
                        @endforeach
                      </span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold text-truncate text-left">
                        @foreach ($data->products as $item)
                        {{$item->pivot->qty}}<br>
                        @endforeach
                      </span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold text-truncate text-left">
                        @foreach ($data->products as $item)
                        {{"Rp " . number_format($item->pivot->sub_total, 0, ".", '.')}}<br>
                        @endforeach
                      </span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold text-truncate">{{"Rp " . number_format($data->total_harga, 0, ".", '.')}}</span>
                    </td>
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="8" class="align-middle text-center mt-3">Transaksi tidak ditemukan!</td>
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
        <div class="modal fade" id="detailModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Detail Order</h4>
                <a type="button" data-bs-dismiss="modal" aria-label="Close">
                  <b>X</b>
                </a>
              </div>
              <div class="modal-body">
                Customer : {{$item->users->name}} <br>
                Tanggal transaksi : {{$item->tgl_transaksi}} <br><br>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($item->products as $list)
                    <tr>
                      <td>{{$list->name}}</td>
                      <td>{{"Rp " . number_format($list->harga, 0, ".", '.')}}</td>
                      <td>{{$list->pivot->qty}}</td>
                      <td>{{"Rp " . number_format($list->pivot->sub_total, 0, ".", '.')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                Total Harga : {{"Rp " . number_format($item->total_harga, 0, ".", '.')}} <br>
                Alamat pengiriman : {{$item->users->address}}
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

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="d-flex align-items-center">
          <h6>Report custom table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Order No.
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    @sortablelink('users.name', 'Customer')
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    @sortablelink('tgl_transaksi', 'Tgl. Transaksi')
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    @sortablelink('tgl_selesai', 'Tgl. Selesai')
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Nama Custom
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    @sortablelink('total_harga', 'Total Harga')
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
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$data->users['name']}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$data->tgl_transaksi}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$data->tgl_selesai}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold text-truncate text-left">
                        @foreach ($data->customs as $item)
                        {{$item->name}}<br>
                        @endforeach
                      </span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold text-truncate">{{"Rp " . number_format($data->total_harga, 0, ".", '.')}}</span>
                    </td>
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6" class="align-middle text-center mt-3">Transaksi tidak ditemukan!</td>
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
                Customer : {{$item->users->name}} <br>
                Tanggal transaksi : {{$item->tgl_transaksi}} <br><br>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nama</th>
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
                      <td>{{"Rp " . number_format($list->total_harga, 0, ".", '.')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                Total Harga : {{"Rp " . number_format($item->total_harga, 0, ".", '.')}} <br>
                Alamat pengiriman : {{$item->users->address}}
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
<script defer>
  function getInputValue() {
    // Selecting the input element and get its value 
    const date1 = document.getElementById("date1").value;
    const date2 = document.getElementById("date2").value;
    const iDate1 = document.querySelector("#i-date1");
    const iDate2 = document.querySelector("#i-date2");
    const iDate3 = document.querySelector("#i-date3");
    const iDate4 = document.querySelector("#i-date4");
    console.log(iDate1)

    iDate1.value = date1
    iDate2.value = date2
    iDate3.value = date1
    iDate4.value = date2
  }
</script>
@endsection
