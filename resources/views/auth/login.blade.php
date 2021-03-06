<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <style>
        body {
            background-color: white !important;
            background-image: url('{{url('assets/images/login_bg.jpg')}}') !important;;
            background-repeat: no-repeat !important;;
            background-position: center center !important;;
        }
        .login-box, .register-box {
            margin: 6% auto;
        }
        .quoc_huy {
            width: 100px;
        }
        .login-box-body, .register-box-body {
            border: 2px solid #F9F1E6;

        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <p>
            <img class="quoc_huy" src="{{url('assets/images/quoc_huy.png')}}">
        </p>
        <a href="javascrip:void(0)">PHẦN MỀM QUẢN LÝ<br>HOẠT ĐỘNG ĐỐI NGOẠI</a>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Vui lòng đăng nhập hệ thống</p>

        <form method="post" action="{{ url('/login') }}">
            @csrf
            @if ($errors->has('error'))
                <span class="help-block text-red text-center text-bold">{{ $errors->first('error') }}</span>
            @endif
            <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Tên đăng nhập">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('username'))
                    <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif

            </div>
            <div class="row">
                <div class="col-xs-7">
                    <div class="checkbox icheck">
                        <label style="height: 22px; vertical-align: middle">
                            <input type="checkbox" name="remember"> Lưu đăng nhập
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

{{--        <a href="{{ url('/password/reset') }}">Quên mật khẩu</a><br>--}}

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
