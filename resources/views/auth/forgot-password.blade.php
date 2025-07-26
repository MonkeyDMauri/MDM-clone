<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js')
</head>
<body>
    <div class="reset-password-email-form-wrapper">
        <h1>Reset your password - Request reset password link</h1>
        <div class="reset-password-email-form-wrap">
            <form action="{{route('password.email')}}" method="POST">
                @csrf
                <label for="email">Enter email</label>
                <br>
                <input type="email" required placeholder="email" id="email" name="email">
                <br>
                <button>Request Link</button>
            </form>
            @if(session('success'))
                <h1>{{session('success')}}</h1>
            @endif
        </div>
    </div>
</body>
</html>