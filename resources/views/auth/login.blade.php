<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">

    <style>
        .login-page{
            background-image: url('{{ asset('asset/background-login.png') }}');
            background-size: cover;
            background-position: center top;
            background-repeat: no-repeat;
            height: 100vh;
        }

        .login-box .card{
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            background: rgba(255,255,255,0.9);
        }

        .login-card-body{
            border-radius: 15px;
            padding: 30px;
        }

        .btn-login{
            background-color: #bb67b5;
            border-color: #bb67b5;
            color: white;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-login:hover{
            background-color: #a956a3;
            border-color: #a956a3;
            color: white;
        }

        h4{
            font-weight: bold;
            color: #bb67b5;
        }
    </style>
</head>

<body class="hold-transition login-page">

<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">

            <h4 class="text-center mb-4">
                Login
            </h4>

            <form method="POST" action="/login">
                @csrf

                <div class="input-group mb-3">
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Email"
                           required>
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Password"
                           required>
                </div>

                <button type="submit"
                        class="btn btn-block btn-login">
                    Login
                </button>

            </form>

        </div>
    </div>
</div>

</body>
</html>