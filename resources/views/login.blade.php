@extends("incs.child")
@section("page_name", "Login")
@section("content")
<section class="why_section layout_padding">
    <div class="container">
<form action="login" method="post">
@csrf
<table id="login_table" align="center">
    <tr>
        <td>Username</td><td><input type="text" name="username"></td>
    </tr>
    <tr>
        <td>Password</td><td><input type="password" name="password"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value = "Login" /></td>
    </tr>
    <tr>
        <td colspan="2">Don't have an account? <a href="/register">Create New Account Here</a></td>
    </tr>
</table>

</form>


{{-- @error('username')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

@error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror --}}

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</div>
</section>

@endsection
