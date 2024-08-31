<head>

  <link href="{{ asset('css/homestyle.css') }}" rel="stylesheet">
  

</head>
<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Latest Products
      </h2>


    </div>
    <div class="row">

      @foreach ($product as $products)
          
      
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          
            <div class="img-box">
              <img src="products/{{$products->image}}" alt="">
            </div>
            <div class="detail-box1">
              <div class="product_title">

              
              <h6>
                {{$products->title}}
              </h6>
            </div>
            <div class="product_price">

              <h6>
                Price:
                <span>
                  $ {{$products->price}}
                </span>
              </h6>
            </div>

            </div>

            <div style="    background-color: blue;
    color: white;
    padding: 6px 15px;
    border-radius: 9px;">
              <a href="{{url('product_details',$products->id)}}" ><span style="color: white">Details</span></a>
             
          

            </div>
            <div class="cart_btn" style="    background-color: rgb(255, 242, 0);
            color: white;
            padding: 6px 15px;
            border-radius: 9px; margin:5px 0px">
                      
                      <a href="{{url('add_cart',$products->id)}}" >Add to cart</a>
                     
                  
        
                    </div>

           
            
          
        </div>
      </div>
      @endforeach



      
    </div>
    {{-- <div class="btn-box">
      <a href="">
        View All Products
      </a>
    </div> --}}
  </div>
</section>