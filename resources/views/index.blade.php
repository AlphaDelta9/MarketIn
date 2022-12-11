{{auth()->user()}}
@foreach ($list as $header)
    {{$header->title}}
@endforeach
