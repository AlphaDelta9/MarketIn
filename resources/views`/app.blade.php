<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Market'In | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('others/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script src="{{ asset('js/main.js') }}" defer></script>
</head>
<body>

@php($user = getUser())

<nav class="bg-white sticky top-0 border-b border-gray-300 z-20">
    <div class="px-5 sm:px-12 md:px-20">
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('page.home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16">
                </a>
            </div>
{{--            <div class="flex-1 px-20">--}}
{{--                <div class="search-input relative">--}}
{{--                    <input type="text" placeholder="Cari proyek..." class="w-full py-4 px-6 bg-gray-100 rounded-full">--}}
{{--                    <a href="" class="w-10 h-10 bg-primary border border-primary transition hover:bg-transparent hover:text-primary text-white rounded-full absolute top-1/2 -translate-y-1/2">--}}
{{--                        <i class="fas fa-search absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div>
                <ul class="flex justify-end">
                    <li><a href="{{ route('page.home') }}" class="block py-8 px-10 transition {{ request()->is('/') ? 'bg-gray-100' : '' }} hover:text-primary">Home</a></li>
                    <li><a href="{{ route('page.forum.index') }}" class="block py-8 px-10 transition {{ request()->is('forum') ? 'bg-gray-100' : '' }} hover:text-primary">Forum</a></li>
                    @if($user)
                        <li class="dropdown">
                            <span class="block py-8 px-10">{{ $user->name }}</span>
                            <ul>
                                <li class="{{ $user->role->name == 'penyedia' ? 'bg-gray-200' : 'bg-primary-light' }} py-4 text-center">{{ $user->role->name }}</li>
                                <li><a href="{{ route('page.profile') }}">Profil</a></li>
                                <li><a href="{{ route('page.history') }}">Riwayat</a></li>
                                <li class="button-container">
                                    <a href="{{ route('system.auth.logout') }}" class="text-center py-2 px-6 w-full bg-primary text-white border border-primary hover:bg-white hover:text-primary rounded-lg transition">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('page.login') }}" class="block py-8 px-10 transition {{ request()->is('login') ? 'bg-gray-100' : '' }} hover:text-primary">Login</a></li>
                        <li><a href="{{ route('page.register') }}" class="block py-8 px-10 transition {{ request()->is('register') ? 'bg-gray-100' : '' }} hover:text-primary">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>

<div style="min-height: 800px;">
    @yield('content')
</div>

<footer>
    <div class="bg-gray-800 text-white py-4">
        <div class="container">
            <div class="text-center">&copy; by Market'In. All Rights Reserved.</div>
        </div>
    </div>
</footer>

</body>
</html>
