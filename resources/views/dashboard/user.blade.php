@extends('../layouts.mainlayout')

@section('title', 'Users')

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
                    <a class="nav-link active" href="/user">
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
                <div class="dropdown col-auto">
                    <a href="/user" class="btn bg-gradient-dark btn-sm ms-auto px-3 my-1" type="submit">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                    </a>
                </div>
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
                            <form class="mx-3" action="/user-pdf" method="get">
                                <input hidden class="form-control btn btn-sm bg-gradient-secondary mb-1 px-3 my-1" type="date" name="iDate1" id="i-date1" />
                                <input hidden class="form-control btn btn-sm bg-gradient-secondary mb-1 px-3 my-1" type="date" name="iDate2" id="i-date2" />
                                <button type="submit" class="btn bg-gradient-dark btn-sm ms-auto my-1">
                                    <i class="fa fa-file-pdf-o me-1" aria-hidden="true"></i>
                                    PDF
                                </button>
                            </form>
                            <form class="mx-3" action="/user-excel" method="get">
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

                <div class="col-lg-4 col-md-6 col-sm-7 col-12 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
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

@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card mb-4 rounded">
            <div class="card-header pb-0">
                <div class="row gx-4 mb-3">
                    <div class="dropdown col-auto">
                       <h6>Users Table</h6>
                    </div>
                </div>
            <div class="card-body px-0 pt-0 pb-2">
                @if(Session::has('status'))
                    <div class="alert alert-success ms-1 my-3 font-weight-bold" role="alert">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        {{Session::get('message')}}
                    </div>
                @elseif(Session::has('failed'))
                    <div class="alert alert-danger ms-1 my-3 font-weight-bold" role="alert">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        {{Session::get('message')}}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger ms-1 my-3 font-weight-bold" role="alert">
                        tambah / update pengguna gagal!
                    </div>  
                @endif
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                No
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Avatar
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                @sortablelink('name', 'Nama')
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                @sortablelink('phone', 'No. Telepon')
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                @sortablelink('username', 'Username')
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                @sortablelink('email', 'Email')
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($userList) > 0)
                        @foreach ($userList as $data)
                            <tr>
                                <td class="align-middle text-center py-4">
                                    <span class="text-secondary text-xs font-weight-bold">{{$loop->iteration + $userList->firstItem() - 1}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <img src="{{ $data->image ? asset('storage/' . $data->image) : asset('/images/profile.jpg') }}" class="avatar avatar-sm me-2" alt="{{$data->name}}" />
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$data->name}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$data->phone}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$data->username}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$data->email}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <a data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id}}">
                                        <i class="fas fa-eye text-green-300 px-1"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="align-middle text-center mt-3">User tidak ditemukan!</td>
                            </tr>
                        @endif
                        
                    </tbody>
                </table>
                </div>
                <div class="my-4 d-flex justify-content-center">
                    {!! $userList->appends(Request::except('page')) !!}
                </div>
            </div>
            @foreach ($userList as $item)

                <!-- Detail Modal -->
                <div class="modal fade" id="detailModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Detail Pengguna</h4>
                        <a type="button" data-bs-dismiss="modal" aria-label="Close">
                            <b>X</b>
                        </a>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex">
                                <div class="col-12 col-sm-4 text-center sm-text-center">
                                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('/images/profile.jpg') }}" class="rounded" width="150px" alt="{{$item->name}}" />
                                </div>
                                <div class="col-12 col-sm-8">
                                    <span class="font-weight-bold">Nama pengguna :</span> {{$item->name}} <br>
                                    <span class="font-weight-bold">Role :</span> {{$item->roles->name}} <br>
                                    <span class="font-weight-bold">Alamat :</span> {{$item->address}}
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End Detail Modal -->
            @endforeach
            </div>
        </div></div>
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
    {{-- <script>
        $(document).ready(function(){
          // Show the Modal on load
          $("#createModal").modal("show");
        });
    </script> --}}
    <script>
        function getName(){
            var name = $("#delete").attr("name");
            alert(name);
        }
    </script>
@endsection