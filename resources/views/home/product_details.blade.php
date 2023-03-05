<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        *{
            font-family: 'Montserrat';
        }

        .product-container{
            display: flex;
            height: 100vh;
            width: 100%;
        }

        .container-left{
            margin: 50px 200px;
            width: 40%;            
        }

        .container-right{
            margin: 50px 0;
            margin-right: 200px;
        }

        .container-left img{
            max-width: 100%;
        }

        .container-right{
            display: flex;
            flex-direction: column;
            width: calc(60% - 200px);
        }

        span{            
            margin-bottom: 12px;            
        }

        .buy{
            margin-top: 40px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')         
         <!-- end header section -->      

        <div class="product-container">
            <div class="container-left">
                <img src="product/{{$product->image}}" alt="">
            </div>
            <div class="container-right">
                <h1 style="font-weight: bold; text-transform: uppercase; font-family: 'Montserrat';">{{$product->title}}</h1>                
                <span>
                    @if($product->discount_price != null)
                    <h5 style="text-decoration: line-through; font-size: 16px; color: #aaaaaa">
                        Rp{{$product->price}}
                    </h5>                        
                    <h4>
                        Rp{{$product->discount_price}}
                    </h4>                                                 
                    @else                                                
                    <h4>
                        Rp{{$product->price}}
                    </h4>                        
                    @endif                    
                </span>
                <h5 style="color: #aaaaaa">Category: {{$product->category}}</h5>
                <p style="font-size: 20px;">
                    {{$product->description}}                    
                </p>
                
                <div class="buy">
                    <p>Stock: {{$product->quantity}}</p>
                    <a href="" class="btn btn-success">Add to Cart</a>
                </div>
            </div>
        </div>

      <!-- footer start -->
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
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