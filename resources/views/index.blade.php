{{auth()->user()}}
@foreach ($list as $header)
    <a href={{secure_url('show/'.$header->id)}}>
        {{$header->title}}
    </a>
@endforeach
