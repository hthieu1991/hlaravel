@extends("adm.app")

@section("content")

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Product List</span>
            </div>

            <div class="boxes">
                <form method="POST" action="add_product" enctype="multipart/form-data">
                    @csrf
                <table>
                    <tr>
                        <td>Product Name:&nbsp;</td>

                        <td>Product Description:&nbsp;</td>

                        <td>Product Image:&nbsp;</td>

                        <td>Product Price:&nbsp;</td>

                        <td>Total:&nbsp;</td>

                        <td>Product Status:&nbsp;</td>

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
                        </tr>
                        @endforeach

                    @endif

                </table>
            </form>
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

@endsection
