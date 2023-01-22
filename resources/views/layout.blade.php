<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-warning bg-opacity-25">
        <div class="container-fluid">
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link @if (url()->current() == url("index")) active @endif"
                    href="{{url("index")}}">Home</a>
              </li>
              @auth
                  @if (auth()->user())
                  <li class="nav-item">
                    <a class="nav-link @if (url()->current() == url("create")) active @endif"
                        href="{{url("create")}}">Create</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if (url()->current() ==
                    url("history/".auth()->user()->id."/project")) active @endif"
                        href="{{url("history/".auth()->user()->id."/project")}}">History</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if (url()->current() ==
                    url("history/".auth()->user()->id."/assign")) active @endif"
                        href="{{url("history/".auth()->user()->id."/assign")}}">History</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if (url()->current() == url("profile/".auth()->user()->id."")) active @endif"
                        href="{{url("profile/".auth()->user()->id."")}}">Profile</a>
                  </li>
                  @endif
              @endauth
            </ul>
          </div>
          <form class="d-flex">
            @guest
                <a href="{{url("login")}}">Login</a>
                <a href="{{url("register")}}">Register</a>
            @endguest
            @auth
                <button type="submit"><a href="{{url("logout")}}">Logout</a></button>
            @endauth
          </form>
        </div>
    </nav>
    @yield('content')
</body>
</html>
