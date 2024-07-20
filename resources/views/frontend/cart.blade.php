@extends('layouts.site')
@section('title','Giỏ Hàng')

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

{{-- @section('content') --}}
    
<div class="container">
    <h1 class="text-center" style="color: violet">Giỏ Hàng</h1>
   <form action="{{route('site.cart.update')}}" method="POST">
    @csrf
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th style="width:90px">Hình</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Thành Tiền</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalMoney=0;
            @endphp
            @foreach($list_cart as $row_cart)
            <tr>
                <td>{{$row_cart['id']}}</td>
                <td>
                    <img class="img-fluid" src="{{asset('images/products/'.$row_cart['image'])}}" alt="{{$row_cart['image']}}">
                </td>
                <td>{{$row_cart['name']}}</td>
                <td>
                    <input type="number" style="width:60px" min="0" name="qty[{{$row_cart['id']}}]" value="{{$row_cart['qty']}}">
                </td>
                <td>{{number_format($row_cart['price'])}}</td>
                <td>{{number_format($row_cart['price'] * $row_cart['qty'])}}</td>
                <td class="text-center">
                    <a href="{{route('site.cart.delete',['id'=>$row_cart['id']])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @php
                $totalMoney +=$row_cart['price'] *$row_cart['qty'];
            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">
                    <a class="btn btn-success px-3" href="{{route('site.home')}}">Mua thêm</a>
                    <button type="submit" class="btn btn-primary px-3">Cập nhật</button>
                    <a class="btn btn-info px-3" href="{{ route('site.cart.checkout') }}">Thanh Toán</a>
                </th>
                <th colspan="3" class="text-end">
                    <strong>Thành Tiền: <label style="color:red">{{number_format( $totalMoney)}}</label></strong>
                </th>
            </tr>
        </tfoot>
    </table>
   </form>
</div>
{{-- @endsection --}}
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