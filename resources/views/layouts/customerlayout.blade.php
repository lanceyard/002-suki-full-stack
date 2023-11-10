<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suki | @yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('/images/logo-sm.png')}}" />
    <meta name="msapplication-TileImage" content="{{asset('/images/logo-sm.png')}}" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    @vite('resources/css/app.css')
</head>
<body>
    <label id="title" for="" class="hidden">@yield('title')</label>
    {{-- header start --}}
    <header class="bg-primary fixed top-0 left-0 w-full z-10 shadow-lg">
        <div class="container">
            <div class="flex items-center justify-between px-4">
                <div class="">
                    <a href="/" class="font-bold text-slate-900 text-lg block py-6">sumberejeki</a>
                </div>
                <div class="flex items-center">
                    <nav id="nav-menu" class="absolute py-5 bg-primary shadow-lg max-w-[250px] w-full -right-[500px] top-0 z-20 h-[100vh] transition-all ease-in-out duration-500 lg:block lg:static lg:h-5 lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none lg:py-0">
                        <ul class="mt-7 lg:-mt-2.5 lg:flex">
                            <li class="group">
                                <a href="/" class="text-base text-dark py-2 px-8 lg:px-4 flex group-hover:text-active a-menu">Beranda</a>
                            </li>
                            <li class="group">
                                <a href="/produk" class="text-base text-dark py-2 px-8 lg:px-4 flex group-hover:text-active a-menu">Produk</a>
                            </li>
                            <li class="group">
                                <a href="/tentang" class="text-base text-dark py-2 px-8 lg:px-4 flex group-hover:text-active a-menu">Tentang Kami</a>
                            </li>
                            <li class="group">
                                <a href="/kontak" class="text-base text-dark py-2 px-8 lg:px-4 flex group-hover:text-active a-menu">Kontak</a>
                            </li>
                            <li class="group">
                                <a id="close" href="#" class="text-base text-dark py-2 px-8 flex group-hover:text-active absolute right-44 top-4 lg:hidden"><i class="far fa-times"></i></a>
                            </li>
                        </ul>
                    </nav>
                    <div class="flex items-center">
                        <a href="#" class="block lg:ms-4"><i class="far fa-shopping-bag mr-4 text-[25px] lg:text-xl hover:text-active"></i></a>
                        <a id="hamburger" href="#" class="block lg:hidden"><i class="fas fa-outdent text-[25px]"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    @yield('content')

    <script src="{{ asset('js/index.js') }}"></script>

</body>
</html>