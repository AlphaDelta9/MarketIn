<form action="{{secure_url("profile/$user->id")}}" method="post">
    @csrf
    <input type="text" name="name" id="" placeholder="Name" value="{{old('name',$user->name)}}">
    <input type="email" name="email" id="" placeholder="Email" value="{{old('email',$user->email)}}">
    <input type="password" name="password" id="" placeholder="Password">
    <input type="password" name="password_confirmation" id="" placeholder="Confirm Password">
    <input type="submit" value="Save">
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
