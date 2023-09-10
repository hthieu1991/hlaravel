@extends("incs.child")

@section("page_name", "Profile")

@section("content")
<section class="why_section layout_padding">
    <div class="container">
<form action="login" method="post">
@csrf
<table id="user_profile" align="center">
    <tr>
        <td>Username:&nbsp;</td><td>{{$userdata->username}}</td>
    </tr>
    <tr>
        <td>Email:&nbsp;</td><td>{{$userdata->email}}</td>
    </tr>
    <tr>
        <td><a href="{{route("admin_home")}}">Go to admin page</a></td>
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
