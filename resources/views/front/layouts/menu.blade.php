<div class="container">
    <div class="navbar-brand is-flex-touch">
        <a class="navbar-item" href="/">
            <img src="/assets/images/logo.png">
        </a>
        <div class="is-hidden-desktop is-flex-touch">
            {{-- <div class="icon-mobile icon-navbar">
                <a href="">
                    <svg class="user-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.66 30.37">
                        <path
                            d="M13.33,3A5.87,5.87,0,1,1,7.46,8.87,5.87,5.87,0,0,1,13.33,3m0-3A8.87,8.87,0,1,0,22.2,8.87,8.88,8.88,0,0,0,13.33,0Z" />
                        <path class="a" d="M1.5,28.87a11.83,11.83,0,1,1,23.66,0Z" />
                    </svg>
                </a>
                <a href="">
                    <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.62 31.14">
                        <path class="a" d="M6,7.37a5.87,5.87,0,1,1,11.73,0" />
                        <path d="M20.62,10.51V28.14H3V10.51H20.62m3-3H0V31.14H23.62V7.51Z" /></svg>
                </a>
            </div> --}}
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
    </div>

    <div id="navbarBasicExample" class="flex items-center justify-between">
        <ul class="flex justify-end">
        @guest
        <li>
            <a href="{{ url('login') }}" class="navbar-item @if(url()->current() == url('login') )is-active @endif">
                Login
            </a>
        </li>

        <li>
            <a href="{{ url('register') }}" class="navbar-item @if(url()->current() == url('register') )is-active @endif">
                Register
            </a>
        </li>
        @endguest
        @auth
        @if (auth()->user()->role)
        <a href="{{ url('create') }}" class="navbar-item @if(url()->current() == url('history') )is-active @endif">
            Create
        </a>
        @endif
        <a href="{{ url('history') }}" class="navbar-item @if(url()->current() == url('history') )is-active @endif">
            History
        </a>

        <a href="{{ url('profile') }}" class="navbar-item @if( url()->current() == url('profile') )is-active @endif">
            Profile
        </a>

        <a href="{{url('logout')}}" class="navbar-item @if(url()->current() == url('logout') )is-active @endif">
            Logout
        </a>
        @endauth
        </ul>
        <!-- <div class="navbar-item icon-navbar is-hidden-touch">
            <a href="">
                <svg class="user-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.66 30.37">
                    <path
                        d="M13.33,3A5.87,5.87,0,1,1,7.46,8.87,5.87,5.87,0,0,1,13.33,3m0-3A8.87,8.87,0,1,0,22.2,8.87,8.88,8.88,0,0,0,13.33,0Z" />
                    <path class="a" d="M1.5,28.87a11.83,11.83,0,1,1,23.66,0Z" />
                </svg>
            </a>
            <a href="">
                <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.62 31.14">
                    <path class="a" d="M6,7.37a5.87,5.87,0,1,1,11.73,0" />
                    <path d="M20.62,10.51V28.14H3V10.51H20.62m3-3H0V31.14H23.62V7.51Z" /></svg>
            </a>
        </div> -->
    </div>
</div>
