<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .div_deg{
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 60px;
    }
    table{
      border: 2px solid black;
      text-align: center;
      width: 800px;
      
    }
    th{
      border: 2px solid black;
      text-align: center;
      color: white;
      font-size: 20px;
      font-weight: bold;
      background-color: black

    }
    td{
      border: 1px solid skyblue;
    }
    .cart_val{
      text-align: center;
      margin-bottom: 70px;
      padding: 18px;
    }
  
    .order_deg{
      padding-right: 100px;
      margin-top: -50px;
    }
    label{
      display: inline-block;
      width: 150px;
    }
    .div_gap{
padding: 20px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    
    <!-- end header section -->
   
  </div>
  <!-- end hero area -->


 

<div class="div_deg">
  <div class="order_deg">

  <form action="{{url('confirm_order')}}" method="POST">
    @csrf
    <div class="div_gap">

      <label >Receiver Name</label>
      <input type="text" name="name"  value="{{Auth::user()->name}}">
    </div>
    <div class="div_gap">

      <label >Receiver Address</label>
      <textarea name="address" id="" cols="30" rows="10"> {{Auth::user()->address}}</textarea>
    </div>
    <div class="div_gap">

      <label > Phone Number</label>
      <input type="number" name="phone"  value="{{Auth::user()->phone}}">
    </div>
    <div class="div_gap">

      
      <input type="submit" value="Place Order" class="btn btn-primary" >
      <a class="btn btn-success" href="{{url('stripe',$value)}}">Pay using Card</a>
    </div>
  </form>
  </div>


  <table>
    <tr>
      <th>Product title</th>
      <th>Price</th>
      <th>Image</th>
      <th>Action</th>


    </tr>

    <?php
$value=0;
    ?>
    @foreach($cart as $cart)
    <tr>
      <td>{{$cart->product->title}}</td>
      <td>{{$cart->product->price}}</td>
      <td>
        <img src="/products/{{$cart->product->image}}" width="150">
      </td>
      <td>
        <a href="{{url('delete_cart',$cart)}}" class="btn btn-danger">Remove from cart</a>
      </td>


    </tr>
    <?php
$value=$value+$cart->product->price;
    ?>
    @endforeach
  </table>
</div>

<div class="cart_val">
  <h3>Total amount:${{$value}}</h3>
</div>


  





 

  <!-- info section -->

 @include('home.footer')
</body>

</html>