<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.min.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="site">
        <div class="site_main">
            <div class="login">
                <div class="logo">
                    <img src="assets/img/thpt.jpg" alt="" sizes="" srcset="">
                </div>
                <div class="title">
                    <h1 class="name">Quản lý thiết bị</h1>
                </div>
                <form class="fr_login" action="{{ route('admin.ConfLogin') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form_input">
                        <input type="text" name='username'  class="input username" placeholder='Nhập tên đăng nhập ...'>
                    </div>
                    <div class="form_input">
                        <input type="password" name='password' class="input password" placeholder='Nhập mật khẩu...'>
                    </div>
                    <div class="form_input">
                        <input type="submit" value="Đăng nhập" class="btn password">
                    </div>
                   
                </form>
                @if(session('failed'))
                    <p style="color: red">{{ session('failed') }}</p>
                @endif
                
            </div>
        </div>
    </div>
</body>
</html>