@extends('layouts.site')
@section('title','Trang Chủ')
@section('content')
<section class="myheader">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                <a href="http://127.0.0.1:8000/">
                    <img src="{{asset('img/logo.webp')}}" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="col-md-4">
                <form action="{{ route('site.product.search') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Từ khóa tìm kiếm" aria-label="Từ khóa tìm kiếm" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                </form>
            </div>
            
            <!-- Hiển thị kết quả tìm kiếm -->
            @if (!empty($keyword))
                <h2>Kết quả tìm kiếm cho từ khóa: "{{ $keyword }}"</h2>
            @endif
            
            <div class="col-md-3">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <div class="fs-3 text-danger">
                                    <i class="fa-solid fa-phone"></i>
                                </div>    
                            </div>
                            <div class="col-9">Tư vấn hổ trợ <br>
                                <strong class="text-danger">0359620485</strong>
                            </div>

                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                              
                                @if (Auth::check())
                                @php
                                    $user = Auth::user();
                                @endphp
                                   <div class="fs-3 text-danger">
                                    <i class="fa-regular fa-user"></i>
                                </div> 
                                  
                                </div>   
                                
                                <div class="col-9" style="tab-size: 0.1ch">Xin chào: <strong>{{$user->name}}</strong><br>
                                    <a href="{{ route('website.logout') }}">
                                        <strong class="text-danger">  Đăng Xuất</strong>
                                      </a>
                              @else
                              <div class="fs-3 text-danger">
                                <i class="fa-regular fa-user"></i>
                                </div> 
                              
                                </div>   
                            
                                <div class="col-9">Xin chào:<br>
                                
                                <a href="{{ route('website.getlogin') }}" class="no-underline">
                                    
                                    <strong class="text-danger">Đăng nhập</strong>
                                </a>
                                   
                                    
                                @endif
                                </a>
                            </div>
                            <style>
                                .no-underline {
                                    text-decoration: none;
                                }
                            </style>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col">    <a href="#" class="position-relative">
                        <span class="fs-2"><i class="fa-regular fa-heart"></i></span>
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">0
                        </span>
                    </a></div>
                  
                    {{-- @if (Auth::check())
                    @php
                        $user = Auth::user();
                    @endphp --}}
                    {{-- <div class="col">    
                        <a href="#" class="position-relative">
                            <span class="fs-2"> --}}
                                {{-- {{$user->name}} --}}
                                {{-- <i class="fa-regular fa-user"></i></span>
                            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                            </span>
                        </a>
                    </div> --}}
                    {{-- @else --}}
                    {{-- <div class="col">    
                        <a href="#" class="position-relative">
                            <span class="fs-2"><i class="fa-regular fa-user"></i></span>
                            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">Xin chào
                            </span>
                        </a>
                    </div>   --}}
                    {{-- @endif --}}
                    <div class="col">   
                        @php
                              $count = count(session('cart',[]));
                        @endphp
                       <a href="{{route('site.cart.index')}}" class="position-relative">
                            Giỏ Hàng(<span id="showqty">{{$count}}</span>)
                        </a>
                    </div>
                 

                </div>
            
             
            
            </div>

        </div>
    </div>
</section>
<!-- myheader -->
<section class=" bg-danger">
    <x-main-menu/>
</section>
<section class="mymaincontent my-3">
 <div class="comtainer">
  
    <!-- slider -->
    <x-slider/>
    <!-- end-slider -->

     <!-- sản phẩm -->
     {{--  --}}
     <div class="py-2 text-center" style="color:violet; font-weight: bold;">
        <h3>SẢN PHẨM MỚI</h3>
        </div>
        <div class="py-2 text-center">
            <x-product-new />
        </div>
  
   <div class="py-2 text-center" style="color:violet; font-weight: bold;">
    <h3>SẢN PHẨM SALE</h3>
    </div>
    <div class="py-2 text-center">
        <x-flash-sale />
    </div>
    
     {{--  --}} 

{{-- @yield('product') --}}
    
   {{--  --}} 
 </div>

</section>
@endsection
@section('footer')
<section class="myfooter bg-dark text-white py-4">
        
    <div class="container">
    <x-last-post/>
        
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h5>THIÊN ĐƯỜNG MUA SẮM THỜI TRANG</h5>
                <p class="m-0">Copyrigt@ 2024 Nguyễn Văn Vinh </p>
                <p class="m-0">Chứng nhận ĐKKD số: 123455678 do sở KH & ĐT TP.HCM</p>
                <p class="m-0">Địa chỉ: 20 Tăng Nhơn Phú, Phước Long B, TP Thủ Đức, TP HCM.</p>
                <p class="m-0">email: nguyenvaninh123@gmail.com</p>
                <p class="m-0">Hotline: 1234567890</p>

            </div>
            <div class="col-md-6">
                <h5>NHẬN TIN KHUYẾN MÃI</h5>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Tìm Kiếm Sản Phảm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text text-white bg-danger" id="basic-addon2">ĐĂNG KÝ</span>
                </div>
                <div class="social-icons">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-tiktok"></i>
                    <i class="fab fa-telegram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">Bản quyền thuộc về nguyễn văn vinh@</div>
            <div class="col-md-6">Trang chủ giới thiệu sản phẩm mới nhất</div>

        </div>

    </div>
</section>
@endsection
