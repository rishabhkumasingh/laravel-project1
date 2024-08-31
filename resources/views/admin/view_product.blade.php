<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    @include('admin.css')
    
    <style type="text/css">
      input{
        width: 400px;
        height: 50px;
      }
      .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px
      }
      input[type='search']{
        width: 500px;
    height: 56px;
    margin-left: 50px;
    margin-bottom: 16px;
    border-radius: 7px;

      }
      .custom-btn {
    width: 120px; 
    padding: 10px;
    font-size: 16px; 
    text-align: center;
    margin: 3px 0px
}
    </style>
  </head>
  <body>
   @include('admin.header')

   @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1 style="color: white">View Product</h1>

            <form action="{{url('product_search')}}" method="GET">
              @csrf
              <input type="search" name="search" >
             
              <button  type="submit" name="" value="search" class="btn btn-secondary">Search</button>
            </form>

            
            <div>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>

                    <th scope="col">quantity</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>



                    
                  </tr>
                </thead>
                @foreach ($product as $products)
                    
                <tbody>
                  <tr>
                    <th scope="row">{{$products->id}}</th>
                    <td>{{$products->title}}</td>
                    <td>{{$products->description}}</td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->quantity}}</td>

                    <td>{{$products->category}}</td>
                    <td>
                      <img src="products/{{$products->image}}" height="120" width="120">
                    </td>

                    <td>
                      <a href="{{url('delete_product',$products)}}" class="btn btn-danger custom-btn">Delete</a>
                    
                      <a href="{{url('edit_product',$products)}}" class="btn btn-success custom-btn">Update</a>
                    </td>
                  </tr>
                
                </tbody>
                @endforeach
              </table>
              <div class="div_deg">

                {{-- {{$product->links()}} --}}

              </div>

            </div>

          {{-- @include('admin.body') --}}
      </div>
    </div>
    <!-- JavaScript files-->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>