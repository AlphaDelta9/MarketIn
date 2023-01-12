@extends('app')

@section('title')
    Project
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="text-2xl">Project</div>
            <form action="" method="POST" class="mt-4">
                @csrf
                <div>
                    <label for="name" class="w-full">Nama Usaha</label>
                    <input type="text" id="name" name="name" class="w-full border-none border-b border-gray-500">
                </div>
            </form>
        </div>
    </section>
@endsection
