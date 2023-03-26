<section class="product_section layout_padding" style="min-height: 100vh;">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>

               <div style="width: 100%; margin-top: 32px;">
                  <form action="{{url('product_search')}}" method="" style="display: flex; gap: 32px;">
                     @csrf
                     <input type="text" name="search" placeholder="Search Products" style="width: 100%; height: 48px;">
                     <input type="submit" value="search" style="height: 48px; text-align: center;">
                  </form>
               </div>

            </div>
            <div class="row">
               @forelse($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details', $products->id)}}" class="option1" style="margin-bottom: 10px;">
                           Learn More
                           </a>
                           <form action="{{url('add_cart', $products->id)}}" method="Post">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="height: 50px; width: 70px;">
                                 </div>
                                 <div class="col-md-4">
                                    <input type="submit" value="Add" style="border-radius: 24px;">
                                 </div>                                 
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h6>
                           {{$products->title}}
                        </h6>
                        @if($products->discount_price != null)
                        <h6 style="text-decoration: line-through; font-size: 14px; color: #aaaaaa">
                           Rp{{$products->price}}
                        </h6>                        
                        <h5>
                           Rp{{$products->discount_price}}
                        </h5>                                                 
                        @else                                                
                        <h6>
                           Rp{{$products->price}}
                        </h6>                        
                        @endif                         
                     </div>
                  </div>
               </div>

               @empty
               <div style="width: 100%">
                  <h1 style="font-family: 'Arial'; text-align: center; font-size: 32px;">
                     No Results for <span style="font-weight: bold;">{{$search_text}}</span>.
                  </h1>
               </div>


               @endforelse
            </div>       
            
            <div class="row" style="display: flex; justify-content: center;">
               <div class="page" style="margin-top: 20px;">
                  {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}            
               </div>                  
            </div>       
         </div>           
</section>