<!doctype html>
<html lang="en">
<head>
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('main.index')}}">Main</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about.index')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.index')}}">Contacts</a>
                </li>
                @can('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.post.index')}}">Admin</a>
                </li>
              @endcan
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-2 ms-2">
    @yield('content')
</div>
</body>
</html>
