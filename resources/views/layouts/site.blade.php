<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('header')
</head>

<body>
    @yield('content')


    @yield('product')

    @yield('footer')
    <style>
        .social-icons {
          display: flex;
          justify-content: center;
        }
      
        .social-icons i {
          font-size: 48px;
          margin: 0 20px;
          color: #3366cc;
          transition: color 0.3s ease;
        }
      
        .social-icons i:hover {
          color: #ff0000;
          transform: scale(1.2);
        }
      </style>
      <style>
        .carousel-item img {
          height: 550px;
        }
        </style>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>