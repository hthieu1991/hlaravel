
      @include("incs.childheader")
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>{{ 'Page name check later' }}</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      @yield("content")
      <!-- footer section -->
      @include("incs.childfooter")
