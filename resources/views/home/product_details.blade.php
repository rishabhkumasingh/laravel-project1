<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
   .box{
    display: flex
   }
   .img{
    margin-right: 15px;
   }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    
 
  </div>


  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
  
            
        
        <div class="col-md-10">
          <div class="box">
            
              <div class="img">
                <img src="/products/{{$data->image}}" width="200">
              </div>
              <div class="detail">
                <h6 style="color: crimson">
                  {{$data->title}}
                </h6>
                <h6><b> Description:</b>
                  {{$data->description}}
                </h6>
                
                <h6>
                 <b>Price:</b> 
                  <span>
                    ${{$data->price}}
                  </span>
                </h6>
                <h6><b>Category:</b>
                  {{$data->category}}
                </h6>
                <h6>
                  <b>Quantity:</b>
                  <span>
                    {{$data->quantity}}
                  </span>
                </h6>
                <div class="add_cart">
                  <a href="{{url('add_cart',$data->id)}}" >Add to cart</a>
                </div>
              </div>


              
  
             
              
            
          </div>
        </div>
        
  
  
  
        
      </div>
      {{-- <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div> --}}
    </div>
  </section>
  








   

  

 @include('home.footer')
</body>

</html>