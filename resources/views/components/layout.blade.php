<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="bi bi-shop"></i> | Wet Market
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavBar"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavBar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->route()->getName() == 'products.create'? 'active': '' }}"
                                aria-current="page" href="/products/create">New Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->route()->getName() == 'products.manage'? 'active': '' }}"
                                aria-current="page" href="/products/manage">Manage Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->route()->getName() == 'products.manage'? 'active': '' }}"
                                aria-current="page" href="/cart">Shopping Cart</a>
                        </li>
                    @endauth
                </ul>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link">Welcome {{ auth()->user()->name }}!</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success mt-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prodcut CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <i class="glyphicon glyphicon-asterisk" width="30" height="24"></i>
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="/products/create">New Product</a>
          </li>
    </div>
  </nav> 
  <div class="container">
        {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html> --}}