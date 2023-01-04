<form action="/login" method="post">
    @csrf
    <input type="email" name="email" id="" placeholder="Email">
    <input type="password" name="password" id="" placeholder="Password">
    <input type="checkbox" name="remember" id=""> Remember
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
