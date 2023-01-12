@extends('app')

@section('title')
    Forum
@endsection

@section('content')
    <section class="py-20">
        <div class="container">
            <div class="grid grid-cols-2 items-center">
                <div>
                    <div class="text-2xl mb-2">Forum</div>
                </div>
                <div class="text-right">
                    <a href="{{ route('page.forum.create', ['id'=> 1]) }}" class="btn btn-primary">Buat Thread</a>
                </div>
            </div>
            <div class="divide-y divide-gray-300">
                @foreach($threads as $thread)
                    <div class="pl-4">
                        <div class="py-4">
                            <div class="text-lg font-bold">{{ $thread['title'] }}</div>
                            <div>{{ $thread['content'] }}</div>
                        </div>
                        <div class="pl-8 py-4">
                            <div class="flex">
                                <input type="text" placeholder="Pesan" class="w-full py-3 px-6 rounded-l-lg bg-gray-100 flex-1">
                                <button class="btn btn-primary rounded-l-none rounded-r-lg">Reply</button>
                            </div>
                            <div class="divide-y divide-gray-300">
                                @foreach($thread['replies'] as $reply)
                                    <div class="p-4">
                                        <div class="text-lg font-bold">{{ $reply['name'] }}</div>
                                        <div>{{ $reply['content'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
