<form action="/register" method="post">
    @csrf
    <input type="text" name="name" id="" placeholder="Name">
    <input type="email" name="email" id="" placeholder="Email">
    <input type="password" name="password" id="" placeholder="Password">
    <input type="password" name="password_confirmation" id="" placeholder="Password">
    <input type="submit" value="Register">
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
