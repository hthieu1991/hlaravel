@extends("incs.child")

@section("content")
<section class="why_section layout_padding">
    <div class="container">
<form action="register" method="post">
@csrf
<table id="register_table" align="center">
    <tr>
        <td>Username</td><td><input type="text" name="username"></td>
    </tr>
    <tr>
        <td>Password</td><td><input type="password" name="password"></td>
    </tr>
    <tr>
        <td>Email</td><td><input type="text" name="email"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value = "Register" /></td>
    </tr>
</table>

</form>

</div>
</section>

@endsection
