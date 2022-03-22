<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="logo"> <img src="{{ asset('img')}}/polindra.png" alt="">
        </div>
        <div class="text-center mt-4 "> <b>SISTEM PENGAMBILAN KEPUTUSAN </b> </div>
        <div class="text-center "> <b>BEASISWA PPA POLITEKNIK NEGERI INDRAMAYU</b> </div>

        <form class="p-3 mt-3" method="POST" action="{{ route('login')}}">
            <div class="form-field d-flex align-items-center">
                @csrf
                <span class="far fa-user"></span>
                <input type="email" name="email" placeholder="Email" required autocomplete="email" autofocus>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <div class="text-center fs-6"> <a href="{{ route('password.request') }}">Forget password?</a> or <a
                href="{{ route('register.custom') }}">register</a> </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
