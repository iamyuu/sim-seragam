<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign In | SIM Seragam</title>

    <link rel="stylesheet" href="{{ asset('public/vendor/materialize/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/materialize/icon/icon-material.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="app">

        @if (count($errors) > 0)
            <div id="error" style="display: none;">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif

        <div class="container">
            <div class="row" style="margin-top: 5%;">
                <div class="col s12 m3"></div>
                <div class="col s12 m6">
                    <div class="card-panel">
                        <h4 class="center-align">Login</h4>
                        <form action="{{ url('login') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="username" autocomplete="off" required autofocus 
                                            value="{{ old('username') }}">
                                    <label for="username">Username</label>
                                </div>

                                <div class="input-field col s12">
                                    <input type="password" name="password" id="password" required>
                                    <label for="password">Password</label>

                                    <div class="hide-show">
                                        <i class="material-icons show">visibility_off</i>
                                    </div>
                                </div>

                                <div class="col s12 input-field">
                                    <button class="btn waves-effect waves-light cyan right">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/vendor/materialize/js/materialize.min.js') }}"></script>
    <script src="{{ asset('public/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('public/js/init.js') }}"></script>
    <script>
        $(document).ready(function() {
            var err = {{ count($errors) > 0 ? 'true' : 'false' }};
            if (err) {
                swal({
                  title : 'Opps...',
                  type  : 'error',
                  html  : jQuery('#error').html(),
                  timer : 5000,
                });
            }
        });
    </script>
</body>
</html>
