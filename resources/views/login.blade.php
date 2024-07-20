<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            background-image: url('{{ asset('images/banner/slider2.jpg') }}');
            /* background-size: cover;              */
            background-position: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
           
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <form action="{{route("website.dologin")}}" method="POST">
          @csrf
            <div class="form-group">
                <label for="username">Tên đăng nhập hoặc Email:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Đăng nhập</button>
            </div>
            <div class="error-message">
                <!-- Hiển thị thông báo lỗi đăng nhập (nếu có) -->
                @if (Session::has('message'))

                <script>
                    toastr.options = {
                        "progressBar": true,
                        "closeButton": true
                    };
                    toastr.error("{{ Session::get('message') }}");
                </script>
            
            @endif
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></script>

</body>
</html>