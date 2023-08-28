@extends("adm.app")

@section("content")

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Product List</span>
            </div>

            <div class="boxes">
                <table>
                    <tr>
                        <td>Product Name</td>

                        <td>Product Description</td>

                        <td>Product Image</td>

                        <td>Product Price</td>

                        <td>Total</td>

                        <td>Product Status</td>

                        <td>Action</td>

                    </tr>
                    @if (isset($product_list))
                        @foreach ($product_list as $product)
                        <tr>
                            <td>{{$product->p_name;}}</td>
                            <td>{{$product->p_desc;}}</td>
                            <td><img width="50px" src="{{URL("storage/uploads/".$product->p_img);}}" /></td>
                            <td>{{$product->p_price;}}</td>
                            <td>{{$product->p_total;}}</td>
                            <td>{{$product->p_status;}}</td>
                            <td><input type="button" value="Delete Ajax" onclick="deleteAjax('{{$product->id}}');" /></td>
                        </tr>
                        @endforeach

                    @endif

                </table>
            </div>
            <a href="{{route('add_product')}}"> Add new product</a>
        </div>
    </div>

    @foreach ($errors->all() as $error)
    <li style="color: red">{{ $error }}</li>
    @endforeach
    @if (isset($message))
        {{$message}}
    @endif

    <script>
        function deleteAjax(id){
            if(confirm("Are you sure delete this product?")) {
                $.ajax({
                    url: '{{route('delete_product')}}',
                    type: 'POST',
                    // dataType: 'json',
                    data: {
                        p_id: id,
                        _token : '{{csrf_token()}}'
                    },
                    success : function(data){
                        if(data = 1) {
                            location.reload();
                        }
                    }

                });
            }
        }
    </script>

@endsection
