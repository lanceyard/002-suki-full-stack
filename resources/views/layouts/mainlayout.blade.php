<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suki | @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
    <link id="pagestyle" href="{{asset('css/argon-dashboard.css')}}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="icon" href="../../images/icon.png" sizes="32x32" />
    <link rel="icon" href="../../images/icon.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="../../images/icon.png" />
    <meta name="msapplication-TileImage" content="../../images/icon.png" />
    @livewireStyles
</head>
<body class="g-sidenav-show bg-gray-100">
    <div class="position-absolute w-100 min-height-300 top-0 position-fixed" style="
        background-image: url('../../images/nv-bg.jpg');
        background-position-y: 50%;">
    </div>

    <!-- Sidebar -->
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
        @yield('aside')
    </aside>

    <main class="main-content position-relative border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-white" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">
                            @yield('title')
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">@yield('title')</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="ms-md-auto pe-md-3 d-flex align-items-center navbar-nav justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0" id="dropdownMenuButton">
                                <span class="d-sm-inline d-none">Halo, {{Auth::user()->name}}</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-chevron-circle-down cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-item d-flex align-items-center">
                                    <a href="/profile" class="text-black">
                                        <i class="fa fa-user fixed-plugin-button-nav cursor-pointer px-2"></i>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#updateModal" class="ps-2">
                                        Profile
                                    </a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="dropdown-item d-flex align-items-center">
                                    <a href="/logout" class="text-black">
                                        <i class="fa fa-sign-out cursor-pointer px-2"></i>
                                    </a>
                                    <a href="/logout" class="ps-2">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        @yield('action')

        <div class="container-fluid pt-4">
            @yield('content')
        </div>

        <div class="container-fluid pt-0 pb-4">
            <footer class="footer pt-3">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                            Copyright©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            Sumber Rezeki II, All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        
    </main>
    
    @yield('javascript')

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Profile</h4>
                    <a type="button" data-bs-dismiss="modal" aria-label="Close">
                        <b>X</b>
                    </a>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><b>{{$error}}</b></li>
                                @endforeach
                            </ul>
                        </div>    
                    @endif
                    <form action="/profile/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="image">Update Foto</label> <br>
                            <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('/images/box.png') }}" class="rounded pb-3" width="100px" alt="{{Auth::user()->image}}" /> <br>
                            <div class="input-group">
                                <input type="file" name="image" class="form-control" id="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload" value="{{Auth::user()->image}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{Auth::user()->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea class="form-control" type="text" name="address" id="address" rows="3" required>{{Auth::user()->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">No. Telepon</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{Auth::user()->phone}}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input class="form-control" type="text" name="username" id="username" value="{{Auth::user()->username}}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{Auth::user()->email}}" required>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Update Modal -->


</body>
</html>