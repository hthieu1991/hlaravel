@extends("adm.app")

@section("content")

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Product List</span>
            </div>

            <div class="boxes">
                <table style="width: 100%;">
                    <tr>
                        <td>Product Name</td>

                        <td>Product Description</td>

                        <td>Product Image</td>

                        <td>Product Price</td>

                        <td>Total</td>

                        <td>Product Status</td>

                        <td>Check all&nbsp;<input type="checkbox" id="check_all" value="" /></td>

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
                            <td>
                                <input type="button" value="Delete Ajax" onclick="deleteAjax('{{$product->id}}');" />
                                <input type="checkbox" class="delete_product" name="delete_product[]" value="{{$product->id}}" />
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="7" align="center">
                                <input type="button" value="Delete All" onclick="deleteAjaxAll();" />
                            </td>
                        </tr>
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
        $("#check_all").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

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

        function deleteAjaxAll(){
            if(confirm("Are you sure delete this product?")) {
                var ids = '';
                    $('.delete_product:checked').each(function(i, e) {
                        ids += $(this).val()+',';
                    });
                // console.log($('input[name="delete_product[]:checked"]'));
                // var data_list = $('input[name="delete_product[]:checked"]').serialize();
                console.log(ids);
                // $.ajax({
                //     url: '{{route('delete_product')}}',
                //     type: 'POST',
                //     // dataType: 'json',
                //     data: {
                //         p_id: id,
                //         _token : '{{csrf_token()}}'
                //     },
                //     success : function(data){
                //         if(data = 1) {
                //             location.reload();
                //         }
                //     }

                // });
            }
        }
    </script>

@endsection
