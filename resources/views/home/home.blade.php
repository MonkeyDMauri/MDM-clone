<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    @vite('resources/js/app.js')
</head>
<body class="home-page">
    <nav class="nav-bar">
        <div class="nav-name-email">
            <h1 class="nav-name">{{auth()->user()->name}}</h1>
            {{-- <br> --}}
            <p class="nav-email">{{auth()->user()->email}}</p>
        </div>

        <ul class="nav-options">
            <li><a href="#">Option</a></li>
            <li><a href="#">Option</a></li>
            <li><a href="#settings">Settings</a></li>
            <li class="logout-btn">Logout</li>
        </ul>
    </nav>
</body>
</html>