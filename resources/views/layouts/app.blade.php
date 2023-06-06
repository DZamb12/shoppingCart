<!DOCTYPE html>
<html lang="en">
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
<body>
  <div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="{{asset('images/catalogue.png')}}" width="50" height="50"/>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @auth
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="create">Create New Product</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/index2">Manage Product</a>
        </li>
        
      </ul>
      @else

      @endauth

      <ul class="navbar-nav">
    
       @auth
        <li>
            <a class="nav-link active" aria-current="page" href="/cart"><i class="bi bi-cart"></i></a>
        </li>
       <li class="nav-item">
          <a  class="nav-link">Welcome {{auth()->user()->name}}</a>
        </li>
      <form method="POST" action="/logoutsss">
        @csrf
        <li class="nav-item">
          <button type="submit" class="nav-link">Logout</button>
        </li>
      </form>
       @else
       <li class="nav-item">
          <a href="/register" class="nav-link">Register</a>
        </li>
        <li class="nav-item">
          <a href="/login" class="nav-link">Login</a>
        </li>


       @endauth
      </ul>

    </div>
  </div>
</nav>
  <div class="container">
    
    {{  $slot  }}
    </div>
    </div>
</body>
</html>