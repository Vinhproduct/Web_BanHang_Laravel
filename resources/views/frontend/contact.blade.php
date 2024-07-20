@extends('layouts.site')
@section('title','liên hệ')
<section class="myheader">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                <a href="http://127.0.0.1:8000/">
                    <img src="{{asset('img/logo.webp')}}" class="img-fluid" alt="Logo">
                </a>
                
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Từ khóa tìm kiếm" aria-label="Từ khóa tìm kiếm" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></span>
                  </div>
            </div>
            <div class="col-md-3">
                <div class="row">
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
            <div class="col-md-2">
                <div class="row">
                    <div class="col">    <a href="#" class="position-relative">
                        <span class="fs-2"><i class="fa-regular fa-heart"></i></span>
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">0
                        </span>
                    </a></div>
                
                    <div class="col">    <a href="#" class="position-relative">
                        <span class="fs-2"><i class="fa-solid fa-print"></i></span>
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">0
                        </span>
                    </a></div>
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

@section('content')
<div class="container" style="margin-top:25px;">
    <div class="text-center">
    <h1 style="color: violet">LIÊN HỆ SHOP</h1>
</div>
        
        <div class="row">
            <div class="col-md-6">
                <h4 style="text-align: center">Thông tin liên hệ</h4><br>
           <p><b>Địa chỉ:</b> 20 Tăng Nhơn Phú, Phước Long B, Quận 9, Thành phố Hồ Chí Minh</p><br>
           <p><b>Số điện thoại:</b> 1234567890 || 0987654321</p><br>
           <p><b>email:</b> VinhShoppe@mail.com</p><br>
           <p><b>fanpage:</b><a href="https://www.facebook.com/VinhNguyen0zz">Liên hệ qua Facebook</a><div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0" nonce="SrEECaBH"></script>
            <div class="fb-page" data-href="https://www.facebook.com/VinhNguyen0zz" data-tabs="message" data-width="700px" data-height="1750px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/VinhNguyen0zz" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/VinhNguyen0zz">Simple L o V e</a></blockquote></div></p>
            </div>


            {{-- /// --}}
            <div class="col-md-6">
                <h4 style="text-align: center">Bảng đồ</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7467760963846!2d106.77242407488343!3d10.830680489321422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526ffdc466379%3A0x89b09531e82960d!2zMjAgVMSDbmcgTmjGoW4gUGjDuiwgUGjGsOG7m2MgTG9uZyBCLCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1698599549170!5m2!1svi!2s"
                 width="750px" height="450px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
  
</div>  
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