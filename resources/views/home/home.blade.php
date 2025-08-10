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

    <div class="body-main">
        <nav class="nav-bar">

            <div class="nav-section-1">
                <img src="{{ asset('images/elden_ring_logo2.png')}}" alt="elden ring logo"
                class="elden-ring-logo">
                <div class="nav-name-email">
                    <h1 class="nav-name">{{auth()->user()->name}}</h1>
                    {{-- <br> --}}
                    <p class="nav-email">{{auth()->user()->email}}</p>
                </div>
            </div>
            

            <ul class="nav-options">
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#settings">Settings</a></li>
                <li class="logout-btn">Logout</li>
            </ul>
        </nav>
    </div>
    
</body>
</html>