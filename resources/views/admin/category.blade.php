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
    </style>
  </head>
  <body>
   @include('admin.header')

   @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>Add Category</h1>

            <div class="div_deg">
            <form action="{{url('add_category')}}" method="POST">
              @csrf
              <div>
                <input type="text" name="category">
              </div>
              <div>
                <input class="btn btn-primary" type="submit" value="Add Category">
              </div>
            </form>
            </div>

            <div>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>

                    
                  </tr>
                </thead>
                @foreach ($data as $data)
                    
                <tbody>
                  <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->category_name}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                      <a href="{{url('delete_category',$data->id)}}" class="btn btn-danger">Delete</a>
                    
                    
                      <a href="{{url('edit_category',$data)}}" class="btn btn-success">Edit</a>
                    </td>
                  </tr>
                
                </tbody>
                @endforeach
              </table>
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