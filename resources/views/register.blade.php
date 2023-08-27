@extends("incs.child")

@section("page_name", "Register")

@section("content")
<section class="why_section layout_padding">
    <div class="container">
<form action="register" method="post">
@csrf
<table id="register_table" align="center">
    <tr>
        <td>Your name</td><td><input type="text" name="name"></td>
    </tr>
    <tr>
        <td>Username</td><td><input type="text" name="username"></td>
    </tr>
    <tr>
        <td>Password</td><td><input type="password" name="password"></td>
    </tr>
    <tr>
        <td>Password Confirm</td><td><input type="password" name="password_confirmation"></td>
    </tr>
    <tr>
        <td>Email</td><td><input type="text" name="email"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value = "Register" /></td>
    </tr>
</table>

</form>


@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

@error('username')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

@error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

@error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{{-- @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach --}}
</div>
</section>

@endsection
