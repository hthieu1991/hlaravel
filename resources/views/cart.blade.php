@extends("incs.child")
@section("page_name", "Cart")
@section("content")
<section class="why_section layout_padding">
    <div class="container">
<form action="update_cart" method="post">
@csrf

<table id="cart_table" align="center" style="width: 100%">
    <tr>
        <td style="width: 10%; border:solid 1px;">ID</td>
        <td style="width: 20%; border:solid 1px;">Name</td>
        <td style="width: 30%; border:solid 1px;">Description</td>
        <td style="width: 10%; border:solid 1px;">Quantity</td>
        <td style="width: 10%; border:solid 1px;">Price</td>
        <td style="width: 10%; border:solid 1px;">Action</td>
    </tr>
    @php
        $cart = session()->get('cart');
        $total_qty = 0;
        $total_price = 0;
    @endphp
    @if(session()->has('cart'))
    @foreach ($cart as $key => $value)
        @php
            $total_qty += $value['p_total'];
            $total_price += $value['p_price'];
        @endphp
        <tr id="{{$key}}">
            <td style="border:solid 1px;">{{ $key }}</td>
            <td style="border:solid 1px;">{{ $value['p_name'] }}</td>
            <td style="border:solid 1px;">{{ $value['p_desc'] }}</td>
            <td style="padding: 10px;border:solid 1px;"><input class="quantity update-cart" type="number" value="{{ $value['p_total'] }}" /></td>
            <td style="padding: 10px;border:solid 1px;">{{ $value['p_price'] }}</td>
            <td style="border:solid 1px;">Delete</td>
        </tr>
    @endforeach
    @endif
    <tr style="border:solid 1px;">
        <td colspan="3">Total</td>
        <td style="padding: 10px;border:solid 1px;">{{ $total_qty }}</td>
        <td style="padding: 10px;border:solid 1px;">{{ $total_price }}</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="6" align="center">
            <input type="button" value="Update Cart" />
            <input type="button" value="Check Out" />
        </td>
    </tr>
</table>

</form>

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</div>
</section>

<script type="text/javascript">
    $('.update-cart').change(function(e){
        e.preventDefault();

        var ele = $(this);
        var id = ele.parents('tr').attr("id");
        var qty = ele.parents('tr').find(".quantity").val();
        var csrf = '{{csrf_token()}}';

        $.ajax({
            url: '{{route('update_cart')}}',
            method: 'POST',
            data: { id: id, p_total: qty, _token: csrf },
            success: function(reponse){
             alert(reponse);
            }
        });

    });
</script>
@endsection
