<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
        }

        .div_center h2{
            font-size: 32px;
            padding-bottom: 32px;
        }

        .input_color{
            color: black;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <div class="main-panel">
          <div class="content-wrapper">

            @if(session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>

            @endif

            <div class="div_center">
                <h2>Add Category</h2>

                <form action="{{url('/add_category')}}" method="POST">
                    @csrf
                    <input type="text" name="category" placeholder="Category Name" class="input_color">
                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                </form>
            </div>
          </div>        
        </div>        
      </div>
      <!-- page-body-wrapper ends -->
    </div>
        @include('admin.script')
  </body>
</html>