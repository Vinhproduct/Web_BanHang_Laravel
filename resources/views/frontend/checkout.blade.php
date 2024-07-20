@extends('layouts.site')
@section('title','Thanh Toán')

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

{{-- @section('content') --}}
    
<div class="container">
    <h1 class="text-center" style="color: violet">Thanh Toán</h1>
  <div class="row">
    <div class="col-md-9">
        
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width:90px">Hình</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                        <th>Thành Tiền</th>
             
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
                            {{$row_cart['qty']}}
                        </td>
                        <td>{{number_format($row_cart['price'])}}</td>
                        <td>{{number_format($row_cart['price'] * $row_cart['qty'])}}</td>
                   
                    </tr>
                    @php
                        $totalMoney +=$row_cart['price'] *$row_cart['qty'];
                    @endphp
                    @endforeach
                </tbody>
            </table>   
    </div>
    <div class="col-md-3">
        <strong>Thành Tiền: <label style="color:red">{{number_format( $totalMoney)}}</label></strong>
    </div>
  </div>
  @if(!Auth::check())
      
  
  <div class="row">
    <div class="col-12">
        <h3>Hãy Đăng Nhập Để Thanh Toán</h3>
        <a href="{{route('website.getlogin')}}">Đăng Nhập</a>
    </div>
  </div>  
  @else
    <form action="{{route('site.cart.docheckout')}}" method="post">
        @csrf
        <div class="row my-5">
            @php
                $user=Auth::user();
            @endphp
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Họ Tên:</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Giới tính:</label>
                    <input type="text" name="gender" value="{{$user->gender}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Email:</label>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Điện Thoại:</label>
                    <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Địa Chỉ:</label>
                    <input type="text" name="address" value="{{$user->address}}" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="">Chú Ý:</label>
                    <textarea name="note" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-12 text-end">
               <button type="submit" class="btn btn-success">Đặt Hàng</button>
            </div>
          </div>
    </form>
  @endif
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
