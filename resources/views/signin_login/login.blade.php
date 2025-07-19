<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDM Login</title>
    @vite('resources/js/app.js')
</head>
<body class="login-page">
    <div class="main-wrapper">
        <div class="main-wrap">
            <h1>Log In</h1>
            <form action="">
                <div class="login-form">
                    <input type="text" placeholder="Username">

                    <input type="password" placeholder="Password">

                    <button class="login-btn">Log In</button>

                    <p>
                        <a href="{{route('signin.page')}}">Don't have an account?</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>