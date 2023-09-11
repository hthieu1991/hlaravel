@extends("incs.child")
@section("page_name", "Products")
@section("content")
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @foreach ($all_product as $product)
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="#" id="{{$product->id}}" onclick="add_to_cart(this.id)" class="option1" onclick="return false;">
                           Add to Card
                           </a>
                           <a href="#" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="{{URL("storage/uploads/".$product->p_img)}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->p_name}}
                        </h5>
                        <h6>
                           ${{$product->p_price}}
                        </h6>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            <div class="btn-box">
               {{-- <a href="">
               View All products
               </a> --}}
               {{-- {{$all_product->links('pagination::bootstrap-4')}} --}}
               {{$all_product->links()}}
            </div>
         </div>
      </section>
      <!-- end product section -->

      <div id="dialog-confirm" title="Add to Cart success!" style="display:none">
         <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
            You added product to cart, please choose next action...</p>
       </div>

      <script>
         var product_ajax_path = '{{route('products_cart')}}';
         var csrf_token = '{{csrf_token()}}';
         var cart_path = '{{route('cart')}}';
      </script>
@endsection
