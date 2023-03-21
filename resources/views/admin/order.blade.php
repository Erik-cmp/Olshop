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

        .center tr td:nth-child(10){
          width: 15%;
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

        <div class="main-panel">
          <div class="content-wrapper" style="background-color: #121212">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif

            <div class="div_center">
                <h2>Manage Orders</h2>
            </div>

            <div class="table-container">
                <table class="center">
                    <tr style="font-weight: bold;">
                        <th>Name</th>                    
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>                                                
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>              
                        <th>Action</th>          
                    </tr>

                    @foreach($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>Rp{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img src="/product/{{$order->image}}" alt="">
                        </td>
                        @if($order->delivery_status == 'Processing')
                        <td>
                            <a href="{{url('deliver', $order->id)}}" class="btn btn-primary" onclick="return confirm('Confirm Action?')">Deliver</a>
                        </td>                        
                        @elseif($order->delivery_status == 'Delivering')
                        <td>
                            <a href="{{url('delivered', $order->id)}}" class="btn btn-success" onclick="return confirm('Confirm Action?')">Finish Delivery</a>
                        </td>                                              
                        @else
                        <td style="color: #ccc">
                            Order Completed
                        </td>
                        @endif                                                
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