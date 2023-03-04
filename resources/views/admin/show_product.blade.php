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
        }

        .table-container{
          width: 100%;
          display: flex;
          justify-content: center;        
        }

        .center{          
          width: 100%;
          text-align: center;                                        
          margin-top: 50px;
          border-radius: 12px;                                      
        }

        .center tr td:nth-child(6), .center tr td:nth-child(5), .center tr td:nth-child(1), .center tr td:nth-child(3), .center tr td:nth-child(4){
          width: 10%;
        }

        .center tr td:nth-child(2), {
          width: 15%;
        }        

        .center tr td:nth-child(7){
          width: 20%;
        }
        
        .center tr td:nth-child(8), .center tr td:nth-child(9){
          width: 5%;          
        }        

        .center tr:nth-child(even){
          background-color: #3A3B3C;          
        }

        .center tr:nth-child(odd){
          background-color: #202020;          
        }    
        
        .center tr td:nth-child(n), .center tr th:nth-child(n){
          border-right: 3px solid #121212;       
        }       

        .center tr, .center td, .center th{          
          padding: 12px;
        }
        
        .center th{
            font-size: 18px;
            padding: 14px;
        }

        .img_size{
            max-height: 200px;
            width: auto;
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
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper" style="background-color: #121212">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif

            <div class="div_center">
                <h2>Show Products</h2>
            </div>

            <div class="table-container">
                <table class="center">
                    <tr style="font-weight: bold;">
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Image</th>
                        <th colspan = "2">Action</th>                        
                    </tr>

                    @foreach($product as $product)

                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <img src="/product/{{$product->image}}" class="img_size">
                        </td>
                        <td>
                            <a href="{{url('delete_product', $product->id)}}" class="btn btn-danger" onclick="return confirm('Confirm Deletion?')">Delete</a>
                        </td>
                        <td>
                            <a href="{{url('update_product', $product->id)}}" class="btn btn-primary">Edit</a>
                        </td>                        
                    </tr>

                    @endforeach
                </table>
            </div>
          </div>        
        </div>        

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
        @include('admin.script')
  </body>
</html>