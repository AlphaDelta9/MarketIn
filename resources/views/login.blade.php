<form action="/login" method="post">
    @csrf
    <input type="text" name="email" id="">
    <input type="password" name="password" id="">
    <input type="radio" name="remember" id="">
    <input type="submit" value="Login">
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
