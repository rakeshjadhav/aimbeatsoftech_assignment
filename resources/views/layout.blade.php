<!DOCTYPE html>
<html>
    <head>
        <title>Aimbeat Softech</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <style type="text/css">
            @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
            body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #17a2b8;
            }
            .navbar-laravel
            {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
            }
            .navbar-brand , .nav-link, .my-form, .login-form
            {
            font-family: Raleway, sans-serif;
            }
            .my-form
            {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            }
            .my-form .row
            {
            margin-left: 0;
            margin-right: 0;
            }
            .login-form
            {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            }
            .login-form .row
            {
            margin-left: 0;
            margin-right: 0;
            }
        </style>
    </head>
    <body style="background-color: #17a2b8;">
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background: beige;
            ">
            <div class="container">
                <a class="navbar-brand" href="#"><b>Aimbeat Softech</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <b><a class="nav-link" href="{{ route('login') }}">Login</a></b>
                        </li>
                        <li class="nav-item">
                            <b><a class="nav-link" href="{{ route('register') }}">Register</a></b>
                        </li>
                        @else
                        <li class="nav-item">
                            <b><a class="nav-link" href="{{ route('logout') }}">Logout</a></b>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <!-- Bootstrap core JavaScript-->
        <script src="/jquery/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js' type='text/javascript'></script>
        <!-- Datepicker -->
        <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
       
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js' type='text/javascript'></script>
        <!-- Datepicker -->
        <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
        <script>
            $(function() {
               $( "#birth_date_picker" ).datepicker();
               $( "#join_date_picker" ).datepicker();
            });  
            let base_url = "{{ env('APP_URL') }}";    
        </script>
    </body>
</html>