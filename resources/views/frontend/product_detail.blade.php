@extends('layouts.site')
@section('title','chi tiết sản phẩm')
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
                            $count = count(session('carts', []));
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
    <div class="container my-3">
        <div class="col-md-12" style="text-align: center;">
            <h1><b style="color: rgb(244, 83, 244);">Chi Tiết Sản Phẩm</b></h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img class="im-fluid w-100" src="{{asset('images/products/'.$product->image)}}" alt="{{$product->image}}">
            </div>
            <div class="col-md-6">
                <h1 style="color: tomato">{{$product->name}}</h1>
                <p>Mô tả</p>
                <h3 class="fs-6">{{$product->description}}</h3>
                <div class="row">
                    @if ($product->pricesale>0 && $product->pricesale< $product->price)
                    <div>
                        <div class="col-6">
                            <h6 style="text-align: center;">Giá: {{ number_format($product->price) }}</h6>
                                <del>{{ number_format($product->pricesale) }}</del>
                        </div>
    
                        <div class="col-6 text-end">50%</div>
                    </div>
                @else
                <div class="col-12">
                    <h6 style="text-align: center;">Giá:{{ number_format($product->price) }}<sub>VNĐ</sub></h6>
                </div>
                @endif    
                </div>
                
                    <div class="input-group mb-3">
                        <input type="number" value="1" min="0" aria-describedby="basic-addon2" id="qty">
                       
                        <button class="input-group-text" id="basic-addon2" onclick="handleAddCart({{ $product->id }})">ĐẶT HÀNG</button>
                      </div>
                
            </div>
        </div>
        {{--  --}}
        <div class="row">
            <div class="col-12">
                <h3>Chi tiết</h3>
                {!! $product->detail !!}
            </div>
        </div>
        <div class="row my-4">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Sản phẩm liên quan</button>
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Bình luận</button>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0"><div class="row">
           
                        @foreach ($product_list as $productitem)
                        <div class="col-md-3">
                            <a href="{{ route('site.product.detail', ['slug' => $productitem->slug]) }}">
                                <img src="{{ asset('images/products/'.$productitem->image) }}" alt="">
                            </a>
                            <a href="{{ route('site.product.detail', ['slug' => $productitem->slug]) }}">
                                <h4>{{ $productitem->name }}</h4>
                            </a>
                            <h5>{{ $productitem->price }}</h5>
                        </div>
                    @endforeach
                    </div>
                </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                        <a href="https://www.facebook.com/">
                            TÍCH HỢP FACEBOOK
                            </a>

                    </div>
                  </div>
            </div>
        </div>

        {{--  --}}
    </div>
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



{{--  --}}
<script>
   function handleAddCart(productid) {
    let qty = document.getElementById("qty").value;
    $.ajax({
        url: "{{ route('site.cart.addcart') }}",
        type: "GET",
        data:{
            productid:productid,
            qty:qty
        },
        success: function(result,status,xhr)
        {
            document.getElementById("showqty").innerHTML = result;
            alert("Thêm Vào Giỏ Hàng Thành Công");
        },
        error: function(xhr,status,error)
        {
            alert(error);
        }
    })
}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection