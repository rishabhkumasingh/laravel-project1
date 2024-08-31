<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
  table{
    border:  2px solid black;
    text-align: center;
  }
  th{
    background-color: rgb(19, 3, 81);
    color: white;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    
  }
  .table_center{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  td{
    color: rgb(0, 0, 0);
    padding: 10px;
    border: 1px solid rgb(0, 0, 0)
  }
</style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    
    <!-- end header section -->
    <div class="table_center">

    <table>
      <tr>
       
        <th>Product Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Status</th>
      </tr>

       @foreach($order as $order)

      <tr>
        <td>{{$order->product->title}}</td>
        <td>{{$order->product->price}}</td>
        <td>
          <img src="products/{{$order->product->image}}" height="200" width="300">
        </td>
        
        <td>{{$order->status}}</td>




      </tr>
      @endforeach 
    </table>
    </div>
    
  </div>
  

 @include('home.footer')
</body>

</html>