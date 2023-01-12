<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
        </div>
        <a href="{{ route('home') }}" class="nav navbar-nav logo-mobile">
            <img src="/app-assets/images/email/logo-214x68.png" style="width:120px; height:100%" alt="">
        </a>
        <ul class="nav navbar-nav align-items-center">
            <li class="nav-item">
                <a class="nav-link nav-link-style">
                    <i class="ficon" data-feather="moon"></i>
                </a>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span>
                        <span class="user-status">{{ Auth::user()->role }}</span>
                    </div>
                    <span class="avatar">
                        <img class="round" width="40" height="40" avatar="{{ Auth::user()->name }}">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <div class="dropdown-item d-sm-none d-block">
                        <i class="mr-50" data-feather="user"></i> {{ Auth::user()->name }}
                        <span class="mt-25 d-block font-small-2">
                            {{ Auth::user()->role }}
                        </span>
                    </div>
                    <a class="dropdown-item" data-toggle="modal" data-target="#inlineForm">
                        <i class="mr-50" data-feather="lock"></i> Ganti Password
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="mr-50" data-feather="power"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
