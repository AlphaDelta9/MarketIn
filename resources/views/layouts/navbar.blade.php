<section id="" class="navbar fixed-navbar" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand is-flex-touch">
            <a class="navbar-item" href="/">
                <img src="/assets/logo.png" alt="">
            </a>
        </div>

        <div id="" class="flex items-center justify-between">
            <ul class="flex justify-end text-center">
                <a href="{{ url('home') }}" class="block py-8 px-10
                @if(url()->current() == url('home') )text-primary @endif">
                    Home
                </a>
                @if (auth()->user()==null || auth()->user()->role )
                <a href="{{ url('search') }}" class="block py-8 px-10
                @if(url()->current() == url('search') )text-primary @endif">
                    Search
                </a>
                @elseif(blank(auth()->user()->role))
                <a href="{{ url('complete') }}" class="block px-10 py-8">
                    Advertising
                </a>
                @endif
            @auth
            @if (filled(auth()->user()->role))
            @if (!auth()->user()->role)
            <a href="{{ url('search') }}" class="block py-8 px-10
            @if(url()->current() == url('search') )text-primary @endif">
                Material Project
            </a>

            <a href="{{ url('iklanin') }}" class="block py-8 px-10
            @if(url()->current() == url('iklanin') )text-primary @endif">
                Advertising Project
            </a>
            @endif

            <a href="{{ url('history') }}" class="block py-8 px-10
            @if(url()->current() == url('history') )text-primary @endif">
                History
            </a>

            <a href="{{ url('profile') }}" class="block py-8 px-10
            @if( url()->current() == url('profile') )text-primary @endif">
                {{auth()->user()->name}}
            </a>
            @else
            <a class="block px-10 py-8 text-primary">
                {{auth()->user()->name}}
            </a>
            @endif
            <a href="{{url('logout')}}" class="block py-8 px-10
            @if(url()->current() == url('logout') )text-primary @endif">
                Logout
            </a>
            @endauth
            </ul>
        </div>
    </div>

</section>
