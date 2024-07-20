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

<div class="container">
    <div class="col md-6">
    <div class="my-5">
        
        <h1>Cảm ơn bạn đã mua hàng!</h1>
        <p>Kính gửi quý khách hàng,</p>
        <p>Chúng tôi xin chân thành cảm ơn sự ủng hộ và niềm tin mà quý khách đã dành cho chúng tôi. Việc quý khách đã mua hàng tại cửa hàng chúng tôi có ý nghĩa rất lớn đối với chúng tôi.</p>
        <p>Chúng tôi mong rằng quý khách đã có trải nghiệm mua sắm tuyệt vời và hài lòng với sản phẩm đã mua. Sự hài lòng của quý khách là niềm vui và động lực cho chúng tôi phục vụ một cách tốt hơn.</p>
        <p>Nếu quý khách có bất kỳ câu hỏi hoặc yêu cầu hỗ trợ nào, xin hãy liên hệ với chúng tôi. Chúng tôi luôn sẵn lòng hỗ trợ quý khách.</p>
        <p>Một lần nữa, chúng tôi xin chân thành cảm ơn quý khách hàng đã mua hàng và tin tưởng chúng tôi. Hy vọng chúng tôi sẽ có cơ hội được phục vụ quý khách một lần nữa trong tương lai.</p>
        <p>Trân trọng,</p>
        <strong>[Nguyễn Văn Vinh]</strong>
    </div>
    </div>
    <div class="col-md-6">
        <div class="my-5"> <a class="btn btn-success px-3" href="{{route('site.home')}}">Mua thêm</a></div>

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
