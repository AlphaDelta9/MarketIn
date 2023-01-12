@if(Auth::check())
    @if(Auth::user()->role=='member')
    <footer id="mobile-menu" class="pl-1 pr-1 text-center navbar-shadow w-100 d-md-none pt-50 pb-50" style="position:fixed; z-index:99999; bottom:0; background-color: #7367f0;">
        <div class="row">
            <a href="{{ route('home') }}" class="col-3 p-0 m-0 font-weight-bold @if(Route::currentRouteName() == 'home') active @endif" style="color:#dcd4d4">
                <i class="feather icon-home font-medium-3"></i>
                <div class="font-small-1">Dashboard</div>
            </a>
            <a href="{{ route('member.event') }}" class="col-3 p-0 m-0 font-weight-bold @if((Route::currentRouteName() == 'member.event' || \Request::is('event/*')) && (!\Request::is('event/freelance')) && !\Request::is('event/freelance/*')) active @endif" style="color:#dcd4d4">
                <i class="feather icon-calendar font-medium-3"></i>
                <div class="font-small-1">Event</div>
            </a>
            <a href="{{ route('member.riwayat-lamaran') }}" class="col-3 p-0 m-0 font-weight-bold @if(Route::currentRouteName() == 'member.riwayat-lamaran')active @endif" style="color:#dcd4d4">
                <i class="feather icon-list font-medium-3"></i>
                <div class="font-small-1">Riwayat Lamaran</div>
            </a>
            <a href="{{ route('message') }}" class="col-3 p-0 m-0 font-weight-bold @if(Route::currentRouteName() == 'message')active @endif" style="color:#dcd4d4">
                <i class="feather icon-mail font-medium-3"></i>
                <div class="font-small-1">Inbox</div>
            </a>
        </div>
    </footer>
    @endif
@endif