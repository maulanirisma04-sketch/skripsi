<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">

            <h4 class="text-center">Login</h4>

            <form method="POST" action="/login">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Login
                </button>
            </form>

        </div>
    </div>
</div>

</body>
</html>