<button type="submit"><a href="{{secure_url("logout")}}">Logout</a></button>
@foreach ($list as $header)
    <a href={{secure_url("show/$header->id")}}>
        {{$header->title}}
    </a>
@endforeach
