@extends("adm.app")

@section("content")
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Product Add</span>
            </div>

            <div class="boxes">
                <form method="POST" action="add_product" enctype="multipart/form-data">
                    @csrf
                <table>
                    <tr>
                        <td>Product Name:&nbsp;</td>
                        <td><input type="text" name="p_name" value="{{ old('p_name', 'Product name sample') }}" /> </td>
                    </tr>
                    <tr>
                        <td>Product Description:&nbsp;</td>
                        <td><textarea name="p_desc"></textarea> </td>
                    </tr>
                    <tr>
                        <td>Product Image:&nbsp;</td>
                        <td><input type="file" id="p_img"  name="p_img" /> </td>
                    </tr>
                    <tr>
                        <td>Product Price:&nbsp;</td>
                        <td><input type="text" name="p_price" value="" /> </td>
                    </tr>
                    <tr>
                        <td>Total:&nbsp;</td>
                        <td><input type="text" name="p_total" value="" /> </td>
                    </tr>
                    <tr>
                        <td>Product Status:&nbsp;</td>
                        <td>
                            <select name="p_status">
                                <option>0</option>
                                <option>1</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Add new product" /> </td>
                    </tr>
                </table>
            </form>
            </div>
            <a href="{{route('list_product')}}"> List products</a>
        </div>
    </div>

    @foreach ($errors->all() as $error)
    <li style="color: red">{{ $error }}</li>
    @endforeach
    @if (isset($message))
        {{$message}}
    @endif

@endsection
