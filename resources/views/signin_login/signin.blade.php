<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    @vite('resources/js/app.js')
</head>
<body class="login-page">
    <div class="main-wrapper">
        <div class="main-wrap">
            <h1>Sign In</h1>
            <form action="{{route('user.signin')}}" method="POST">
                @csrf
                <div class="login-form">
                    <input type="text" placeholder="Username">

                    <input type="text" placeholder="Email">

                    <input type="password" placeholder="Password">

                    <button class="signin-btn">Sign In</button>

                    <p>
                        <a href="{{route('login.page')}}">Already have an account?</a>
                    </p>
                </div>
            </form>
        </div>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
    </div>
</body>
</html>