<div class="container">
    <div class="navbar-brand is-flex-touch">
        <a class="navbar-item" href="/">
            <img src="/assets/logo.png">
        </a>
    </div>

    <div id="navbarBasicExample" class="flex items-center justify-between">
        <ul class="flex justify-end">
            <a href="{{ url('home') }}" class="block py-8 px-10 @if(url()->current() == url('home') )text-primary @endif">
                Home
            </a>
            @if (auth()->user()==null || auth()->user()->role )
            <a href="{{ url('search') }}" class="block py-8 px-10 @if(url()->current() == url('search') )text-primary @endif">
                Search
            </a>
            @elseif(blank(auth()->user()->role))
            <a href="{{ url('complete') }}" class="block px-10 py-8">
                Advertising
            </a>
            @endif
        {{-- @guest
        <li>
            <a href="{{ url('login') }}" class="block py-8 px-10 @if(url()->current() == url('login') )text-primary @endif">
                Login
            </a>
        </li>

        <li>
            <a href="{{ url('register') }}" class="block py-8 px-10 @if(url()->current() == url('register') )text-primary @endif">
                Register
            </a>
        </li>
        @endguest --}}
        @auth
        @if (filled(auth()->user()->role))
        @if (!auth()->user()->role)
        <a href="{{ url('search') }}" class="block py-8 px-10 @if(url()->current() == url('search') )text-primary @endif">
            Material Project
        </a>

        <a href="{{ url('iklanin') }}" class="block py-8 px-10 @if(url()->current() == url('iklanin') )text-primary @endif">
            Advertising Project
        </a>
        @endif

        <a href="{{ url('history') }}" class="block py-8 px-10 @if(url()->current() == url('history') )text-primary @endif">
            History
        </a>

        <a href="{{ url('profile') }}" class="block py-8 px-10 @if( url()->current() == url('profile') )text-primary @endif">
            {{auth()->user()->name}}
        </a>
        @else
        <a class="block px-10 py-8 text-primary">
            {{auth()->user()->name}}
        </a>
        @endif
        <a href="{{url('logout')}}" class="block py-8 px-10 @if(url()->current() == url('logout') )text-primary @endif">
            Logout
        </a>

        {{-- <div class="block px-10 py-8">{{auth()->user()->role ? "Pengguna" : "Penyedia"}}</div> --}}
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
