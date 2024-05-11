@extends('layouts.site')
@section('title','liên hệ')
@section('content')
<div class="container" style="margin-top:200px;">
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