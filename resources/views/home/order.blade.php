<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/logo2.svg" type="">
      <title>Pethaus</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        .div_center{
            text-align: center;
        }

        .div_center h2{
            font-size: 32px;            
        }

        .table-container{
          width: calc(100% - 400px);
          display: flex;
          align-items: center;        
          margin: 0 200px;
          margin-bottom: 100px;
          flex-direction: column
        }

        .center{          
          width: 100%;
          text-align: center;                                        
          margin-top: 50px;
          border-radius: 12px;                                      
        }    

        .center tr:nth-child(even){
          background-color: #EBEBEB;          
        }

        .center tr:nth-child(odd){
          background-color: #DBDBDB;          
        }    
        
        .center tr td:nth-child(n), .center tr th:nth-child(n){
          border-right: 3px solid #FAFAFA;       
        }       

        .center tr, .center td, .center th{          
          padding: 12px;
        }
        
        .center th{
            font-size: 18px;
            padding: 14px;
        }

        .center tr td:nth-child(6){
          width: 15%;          
        } 
        
        .center tr td:nth-child(7){
          width: 5%;          
        }           
        
        .header{
            font-family: 'Arial';
            font-size: 36px;
            font-weight: bold;
            margin-top: 24px;
        }   
    </style>      
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')         
         <!-- end header section -->

         <div style="height: 100px;"></div>

        <h1 style="font-size: 32px; font-weight: bold; font-family: 'Arial'; text-align: center; padding-top: 32px;">My Order</h1>

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
        @endif

        <div class="table-container">
            <table class="center">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Bought At</th>
                </tr>      

                @foreach($order as $order)    
                <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>Rp{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        <img src="product/{{$order->image}}" alt="">
                    </td>
                    <td>
                        @if($order->delivery_status == 'Processing')
                        <a onclick="return confirm('Confirm Cancellation?')" href="{{url('cancel_order', $order->id)}}" class="btn btn-danger">Cancel</a>
                        @else
                        <a href="" class="btn btn-secondary" style="pointer-events: none; color: #ccc">Cancel</a>
                        @endif
                    </td>
                    <td>{{$order->created_at}}</td>
                </tr>   
                @endforeach

            </table>
        </div>   
        
        @include('home.footer')
        <div class="cpy_">
        <p class="mx-auto">© 2023 All Rights Reserved By <a href="">Pethaus.co</a><br>                                       
         </p>
      </div>        
      </div>

 

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>