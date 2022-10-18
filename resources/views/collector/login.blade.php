<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Cashier | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
        body{
            background:#fff;
        }
        .bg-black {
            background-color: #fff !important;
}
    .form-box .header {
    background: #0b81a8 !important;
}
        </style>
    </head>
    <body class="bg-white">

    <div class="form-box" id="login-box" align="center">
        <img src="{{ asset('assets/img/water.png') }}" class="img-responsive" width="150" align="center" style="padding-bottom:50px;">
            <div class="header">Cashier Sign In</div>
            <form action="{{ route('cashier.login') }}" method="post">
            {{ csrf_field() }}
                <div class="body bg-gray">
                    <div class="form-group">  
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                        
                    </div>
                    <div class="form-group">
                        
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>

                </div>
            </form>

        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

    </body>
</html>