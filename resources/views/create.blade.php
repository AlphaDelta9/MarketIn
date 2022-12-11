<form action="/create" method="post">
    @csrf
    <input type="text" name="title" id="">
    <input type="submit" value="Create">
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
