<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .navbar {
            background-color: green;
        }

        .nav-link{
            color:white;
            font-weight: bold;
        }
        .btn-logout {
        background-color: #dc3545;
        color: #f8f9fa;
        transition: color 0.3s ease;
    }

    .btn-logout:hover {
        color: #fff;
    }
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fjalla+One&family=Lilita+One&family=Staatliches&display=swap');
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand text-white" href="/" style="font-family: 'Staatliches';">
                Wet Market |
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/create">Create New Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index2">Manage Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/usertable">Manage Users</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="/cartadmin">
                      Cart |  <i class="bi bi-basket-fill"></i>
                    </a>
                </li>                
                    <li class="nav-item">
                        <a class="nav-link">Welcome {{ auth()->user()->name }}!</a>
                    </li>
                    <form method="POST" action="/logoutsss">
                        @csrf
                        <li class="nav-item">
                          <button type="submit" class="nav-link btn btn-logout">Logout</button>
                          </li>
                    </form>
                </ul>
            </div>
            @else
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </nav>

    <div class="container mt-5">
        {{ $slot }}
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HUkBlbY4HxcP5zLryu7iI3tuHEDz5G0B73O2QMa21pbZMLy1jbE86sMMBgwJXcZQ" crossorigin="anonymous"></script>
</body>
</html>
