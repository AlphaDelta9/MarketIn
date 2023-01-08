<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.css') }}">
    <script src="{{ secure_asset('js/bootstrap.bundle.js') }}"></script>
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-warning bg-opacity-25">
        <div class="container-fluid">
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="{{secure_url("index")}}">Home</a>
              </li>
              @auth
                  @if (auth()->user())
                  <li class="nav-item">
                    <a class="nav-link" href="{{secure_url("create")}}">Create</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{secure_url("history/".auth()->user()->id."/project")}}">History</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{secure_url("history/".auth()->user()->id."/assign")}}">History</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{secure_url("profile/".auth()->user()->id."")}}">Profile</a>
                  </li>
                  @endif
              @endauth
            </ul>
          </div>
          <form class="d-flex">
            @guest
                <a href="{{secure_url("login")}}">Login</a>
                <a href="{{secure_url("register")}}">Register</a>
            @endguest
            @auth
                <button type="submit"><a href="{{secure_url("logout")}}">Logout</a></button>
            @endauth
          </form>
        </div>
    </nav>
    @yield('content')
</body>
</html>
