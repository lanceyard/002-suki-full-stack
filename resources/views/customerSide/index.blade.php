@extends('../layouts.customerlayout')

@section('title', 'Beranda')

@section('content')
{{-- hero start --}}
<section id="home" class="bg-primary pt-36 lg:pt-0">
    <div class="container">
        <div class="flex flex-wrap lg:h-[100vh] lg:px-20">
            <div class="w-full self-center px-4 lg:w-1/2">
                <h4 class="text-xl font-bold mb-4 lg:text-2xl">Trade-in-offer</h4>
                <h1 class="text-4xl font-bold mb-4 lg:text-5xl">Super value deal</h1>
                <h1 class="text-4xl font-bold text-active mb-4 lg:text-5xl">On all products</h1>
                <p class="text-slate-500 font-normal mb-4 lg:text-xl lg:mb-6">See more with coupons & up to 70% off! </p>
                <button class="px-12 py-2 mb-4 bg-cover font-bold text-active" style="background-image: url({{asset('/images/button.png')}})">Shop Now</button>
            </div>
            <div class="w-full self-end lg:w-1/2">
                <img src="{{asset('images/bg-hero.png')}}" alt="" class="lg:scale">
            </div>
        </div>
    </div>
</section>
{{-- hero end --}}

{{-- about start --}}
<section id="about" class="my-10">
    <div class="container">
        <div class="flex flex-wrap justify-center lg:justify-between lg:px-4">
            <div class="w-[40%] border-solid border-active border-[1px] border-opacity-50 rounded-md mx-2 my-2 p-4 text-center shadow-lg lg:w-[15%]">
                <img src="{{asset('images/features/f1.png')}}" alt="">
                <span class="block text-xs mt-2 py-1 bg-pink-200 font-bold text-active rounded-sm">Free Shipping</span>
            </div>
            <div class="w-[40%] border-solid border-active border-[1px] border-opacity-50 rounded-md mx-2 my-2 p-4 text-center shadow-lg lg:w-[15%]">
                <img src="{{asset('images/features/f2.png')}}" alt="">
                <span class="block text-xs mt-2 py-1 bg-lime-200 font-bold text-active rounded-sm">Online Order</span>
            </div>
            <div class="w-[40%] border-solid border-active border-[1px] border-opacity-50 rounded-md mx-2 my-2 p-4 text-center shadow-lg lg:w-[15%]">
                <img src="{{asset('images/features/f3.png')}}" alt="">
                <span class="block text-xs mt-2 py-1 bg-blue-200 font-bold text-active rounded-sm">Save Money</span>
            </div>
            <div class="w-[40%] border-solid border-active border-[1px] border-opacity-50 rounded-md mx-2 my-2 p-4 text-center shadow-lg lg:w-[15%]">
                <img src="{{asset('images/features/f4.png')}}" alt="">
                <span class="block text-xs mt-2 py-1 bg-purple-200 font-bold text-active rounded-sm">Promotions</span>
            </div>
            <div class="w-[40%] border-solid border-active border-[1px] border-opacity-50 rounded-md mx-2 my-2 p-4 text-center shadow-lg lg:w-[15%]">
                <img src="{{asset('images/features/f5.png')}}" alt="">
                <span class="block text-xs mt-2 py-1 bg-violet-200 font-bold text-active rounded-sm">Happy Sell</span>
            </div>
            <div class="w-[40%] border-solid border-active border-[1px] border-opacity-50 rounded-md mx-2 my-2 p-4 text-center shadow-lg lg:w-[15%]">
                <img src="{{asset('images/features/f6.png')}}" alt="">
                <span class="block text-xs mt-2 py-1 bg-red-200 font-bold text-active rounded-sm">Support</span>
            </div>
        </div>
    </div>
</section>
{{-- about end --}}

{{-- product start --}}
<section id="product" class="my-10 lg:my-20">
    <div class="container text-center">
        <h1 class="text-3xl font-bold text-slate-800 mb-4 lg:text-5xl">Featured Products</h1>
        <p class="text-base text-slate-800 font-light mb-10 lg:font-normal">Summer Collection New Moderns Design</p>
        <div class="flex flex-wrap justify-center mx-20 lg:mx-10 lg:justify-start">
            <div class="w-full text-start border-solid border-[1px] border-active border-opacity-50 p-4 rounded-xl relative my-4 shadow-lg lg:w-[22%] lg:mx-4 cursor-pointer">
                <img src="{{asset('images/products/LANDSKRONA.jpg')}}" alt="">
                <hr class="mb-4 border-solid solid-[1] border-active border-opacity-20">
                <p class="text-xs font-medium text-slate-500">Sumber Rejeki</p>
                <h4 class="text-lg font-semibold">Landskrona</h4>
                <div class="flex gap-1 my-1">
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                </div>
                <h3 class="text-active font-bold text-xl">Rp3.000.000</h3>
                <a href="" class="border-solid border-[1px] border-active border-opacity-50 px-2 py-[6px] rounded-full bg-active bg-opacity-10 absolute bottom-4 right-4 hover:bg-active group transition duration-300">
                    <i class="fal fa-shopping-cart text-active group-hover:text-white"></i>
                </a>
            </div>
            <div class="w-full text-start border-solid border-[1px] border-active border-opacity-50 p-4 rounded-xl relative my-4 shadow-lg lg:w-[22%] lg:mx-4 cursor-pointer">
                <img src="{{asset('images/products/LERBERG.jpg')}}" alt="">
                <hr class="mb-4 border-solid solid-[1] border-active border-opacity-20">
                <p class="text-xs font-medium text-slate-500">Sumber Rejeki</p>
                <h4 class="text-lg font-semibold">Lerberg</h4>
                <div class="flex gap-1 my-1">
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                </div>
                <h3 class="text-active font-bold text-xl">Rp600.000</h3>
                <a href="" class="border-solid border-[1px] border-active border-opacity-50 px-2 py-[6px] rounded-full bg-active bg-opacity-10 absolute bottom-4 right-4 hover:bg-active group transition duration-300">
                    <i class="fal fa-shopping-cart text-active group-hover:text-white"></i>
                </a>
            </div>
            <div class="w-full text-start border-solid border-[1px] border-active border-opacity-50 p-4 rounded-xl relative my-4 shadow-lg lg:w-[22%] lg:mx-4 cursor-pointer">
                <img src="{{asset('images/products/MYLLRA.jpg')}}" alt="">
                <hr class="mb-4 border-solid solid-[1] border-active border-opacity-20">
                <p class="text-xs font-medium text-slate-500">Sumber Rejeki</p>
                <h4 class="text-lg font-semibold">Myllra</h4>
                <div class="flex gap-1 my-1">
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                </div>
                <h3 class="text-active font-bold text-xl">Rp1.200.000</h3>
                <a href="" class="border-solid border-[1px] border-active border-opacity-50 px-2 py-[6px] rounded-full bg-active bg-opacity-10 absolute bottom-4 right-4 hover:bg-active group transition duration-300">
                    <i class="fal fa-shopping-cart text-active group-hover:text-white"></i>
                </a>
            </div>
            <div class="w-full text-start border-solid border-[1px] border-active border-opacity-50 p-4 rounded-xl relative my-4 shadow-lg lg:w-[22%] lg:mx-4 cursor-pointer">
                <img src="{{asset('images/products/GLOSTAD.webp')}}" alt="">
                <hr class="mb-4 border-solid solid-[1] border-active border-opacity-20">
                <p class="text-xs font-medium text-slate-500">Sumber Rejeki</p>
                <h4 class="text-lg font-semibold">Glostad</h4>
                <div class="flex gap-1 my-1">
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                </div>
                <h3 class="text-active font-bold text-xl">Rp1.800.000</h3>
                <a href="" class="border-solid border-[1px] border-active border-opacity-50 px-2 py-[6px] rounded-full bg-active bg-opacity-10 absolute bottom-4 right-4 hover:bg-active group transition duration-300">
                    <i class="fal fa-shopping-cart text-active group-hover:text-white"></i>
                </a>
            </div>
            <div class="w-full text-start border-solid border-[1px] border-active border-opacity-50 p-4 rounded-xl relative my-4 shadow-lg lg:w-[22%] lg:mx-4 cursor-pointer">
                <img src="{{asset('images/products/EKTORP.webp')}}" alt="">
                <hr class="mb-4 border-solid solid-[1] border-active border-opacity-20">
                <p class="text-xs font-medium text-slate-500">Sumber Rejeki</p>
                <h4 class="text-lg font-semibold">Ektorp</h4>
                <div class="flex gap-1 my-1">
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                </div>
                <h3 class="text-active font-bold text-xl">Rp2.500.000</h3>
                <a href="" class="border-solid border-[1px] border-active border-opacity-50 px-2 py-[6px] rounded-full bg-active bg-opacity-10 absolute bottom-4 right-4 hover:bg-active group transition duration-300">
                    <i class="fal fa-shopping-cart text-active group-hover:text-white"></i>
                </a>
            </div>
            <div class="w-full text-start border-solid border-[1px] border-active border-opacity-50 p-4 rounded-xl relative my-4 shadow-lg lg:w-[22%] lg:mx-4 cursor-pointer">
                <img src="{{asset('images/products/KLIPPAN.webp')}}" alt="">
                <hr class="mb-4 border-solid solid-[1] border-active border-opacity-20">
                <p class="text-xs font-medium text-slate-500">Sumber Rejeki</p>
                <h4 class="text-lg font-semibold">Klippan</h4>
                <div class="flex gap-1 my-1">
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                </div>
                <h3 class="text-active font-bold text-xl">Rp3.500.000</h3>
                <a href="" class="border-solid border-[1px] border-active border-opacity-50 px-2 py-[6px] rounded-full bg-active bg-opacity-10 absolute bottom-4 right-4 hover:bg-active group transition duration-300">
                    <i class="fal fa-shopping-cart text-active group-hover:text-white"></i>
                </a>
            </div>
            <div class="w-full text-start border-solid border-[1px] border-active border-opacity-50 p-4 rounded-xl relative my-4 shadow-lg lg:w-[22%] lg:mx-4 cursor-pointer">
                <img src="{{asset('images/products/LINANAS.webp')}}" alt="">
                <hr class="mb-4 border-solid solid-[1] border-active border-opacity-20">
                <p class="text-xs font-medium text-slate-500">Sumber Rejeki</p>
                <h4 class="text-lg font-semibold">Linanas</h4>
                <div class="flex gap-1 my-1">
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                </div>
                <h3 class="text-active font-bold text-xl">Rp3.200.000</h3>
                <a href="" class="border-solid border-[1px] border-active border-opacity-50 px-2 py-[6px] rounded-full bg-active bg-opacity-10 absolute bottom-4 right-4 hover:bg-active group transition duration-300">
                    <i class="fal fa-shopping-cart text-active group-hover:text-white"></i>
                </a>
            </div>
            <div class="w-full text-start border-solid border-[1px] border-active border-opacity-50 p-4 rounded-xl relative my-4 shadow-lg lg:w-[22%] lg:mx-4 cursor-pointer">
                <img src="{{asset('images/products/PARUP.jpg')}}" alt="">
                <hr class="mb-4 border-solid solid-[1] border-active border-opacity-20">
                <p class="text-xs font-medium text-slate-500">Sumber Rejeki</p>
                <h4 class="text-lg font-semibold">Parup</h4>
                <div class="flex gap-1 my-1">
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                    <i class="fa fa-star text-yellow-400 text-sm"></i>
                </div>
                <h3 class="text-active font-bold text-xl">Rp6.200.000</h3>
                <a href="" class="border-solid border-[1px] border-active border-opacity-50 px-2 py-[6px] rounded-full bg-active bg-opacity-10 absolute bottom-4 right-4 hover:bg-active group transition duration-300">
                    <i class="fal fa-shopping-cart text-active group-hover:text-white"></i>
                </a>
            </div>
        </div>
    </div>
</section>
{{-- product end --}}
@endsection