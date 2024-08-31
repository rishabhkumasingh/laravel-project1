<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
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
        color: white;
        padding: 10px;
        border: 1px solid white
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
            <h3>All Orders</h3>
            <div class="table_center">

            

            <table>
              <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone number</th>
                <th>Product title</th>
                <th>Price($)</th>
                <th>Image</th>
                <th>Payment Status</th>
                <th>Status</th>
                <th>Change Status</th>
                <th>Print pdf</th>





              </tr>
        
               @foreach($data as $data)

              <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->product->title}}</td>
                <td>{{$data->product->price}}</td>
                <td>
                  <img src="products/{{$data->product->image}}" width="130">
                </td>
                <td>
                  {{$data->payment_status}}
                </td>
                <td>
                  @if($data->status == 'in progress')
                  <span style="color: red">{{$data->status}}</span>
                  @elseif($data->status == 'on the way')
                  <span style="color: rgb(251, 255, 0)">{{$data->status}}</span>

                  @else
                  <span style="color: rgb(43, 255, 0)">{{$data->status}}</span>

                  @endif
                </td>
                <td>
                  <a class="btn btn-primary custom-btn" href="{{url('on_the_way',$data)}}">On the way</a>
                
                  <a class="btn btn-success custom-btn" href="{{url('delivered',$data)}}">Delivered</a>
                </td>
                <td>
                  <a class="btn btn-secondary custom-btn" href="{{url('print_pdf',$data)}}">Print pdf</a>
                </td>




              </tr>
              @endforeach 
            </table>
            </div>


            
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
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
