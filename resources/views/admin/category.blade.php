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
        
        .table-container{
          width: 100%;
          display: flex;
          justify-content: center;        
        }

        .center{          
          width: 50%;
          text-align: center;                                        
          margin-top: 50px;
          border-radius: 12px;                                      
        }

        .center tr td:nth-child(2){
          width: 20%;
        }

        .center tr:nth-child(even){
          background-color: #3A3B3C;          
        }

        .center tr:nth-child(odd){
          background-color: #202020;          
        }    
        
        .center tr td:nth-child(n){
          border-right: 3px solid #121212;       
        }        

        .center tr, .center td{          
          padding: 12px;
        }

        input[type="text"]{
          background-color : #151515; 
        }     

        .center tr:nth-child(1){
            font-size: 18px;
            padding: 14px;
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
          <div class="content-wrapper" style="background-color: #121212">

            @if(session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>

            @endif

            <div class="div_center">
                <h2>View Category</h2>

                <form action="{{url('/add_category')}}" method="POST">
                    @csrf
                    <input type="text" name="category" placeholder="Category Name" style="margin-right: 10px; border-radius: 6px;" required="">
                    <input type="submit" name="submit" value="Add" class="btn btn-success">
                </form>
            </div>

            <div class="table-container">
              <table class="center">
                <tr style="border-bottom: 3px solid #121212">
                  <td style="font-weight: bold;">Category Name</td>
                  <td style="font-weight: bold;">Action</td>
                </tr>

                @foreach($data as $data)
                <tr>
                  <td>{{$data->category_name}}</td>
                  <td><a onclick="return confirm('Confirm Deletion?')" href="{{url('delete_category', $data->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
              </table>
            </div>
          
          </div>        
        </div>        
      </div>
      <!-- page-body-wrapper ends -->
    </div>
        @include('admin.script')
  </body>
</html>