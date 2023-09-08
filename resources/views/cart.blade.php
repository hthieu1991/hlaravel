@extends("incs.child")
@section("page_name", "Cart")
@section("content")
<section class="why_section layout_padding">
    <div class="container">
<form action="login" method="post">
@csrf

<table id="cart_table" align="center" style="width: 100%">

    <tr>
        <td style="width: 10%">ID</td>
        <td style="width: 20%">Name</td>
        <td style="width: 30%">Description</td>
        <td style="width: 10%">Quantity</td>
        <td style="width: 10%">Price</td>
        <td style="width: 10%">Action</td>
    </tr>
    @php
        $cart = session()->get('cart');
        $total_qty = 0;
        $total_price = 0;
    @endphp
    @foreach ($cart as $key => $value)
        @php
            $total_qty += $value['p_total'];
            $total_price += $value['p_price'];
        @endphp
        <tr>
            <td>{{ $key }}</td>
            <td >{{ $value['p_name'] }}</td>
            <td >{{ $value['p_desc'] }}</td>
            <td style="padding: 10px;"><input type="text" value="{{ $value['p_total'] }}" /></td>
            <td style="padding: 10px;"><input type="text" value="{{ $value['p_price'] }}" /></td>
            <td>Delete</td>
        </tr>
    @endforeach
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="padding: 10px;">{{ $total_qty }}</td>
        <td style="padding: 10px;">{{ $total_price }}</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="6">Update Cart</td>
    </tr>
</table>

</form>


@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</div>
</section>

@endsection
