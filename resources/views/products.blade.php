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
                           <a href="#" id="{{$product->id}}" onclick="add_to_cart(this.id)" class="option1">
                           Add to Card
                           </a>
                           <a href="#" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p1.png" alt="">
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
      <script>
         var product_ajax_path = '{{route('products_cart')}}';
         var csrf_token = '{{csrf_token()}}';
      </script>
@endsection
