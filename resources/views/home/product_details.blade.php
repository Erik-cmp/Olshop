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
            max-height: 100vh;
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

        <div class="product-container" style="padding-top: 100px;">
            <div class="container-left">
                <img src="product/{{$product->image}}" alt="">
            </div>
            <div class="container-right">
                <h1 style="font-weight: bold; text-transform: uppercase; font-family: 'Montserrat'; font-size: 36px;">{{$product->title}}</h1>                
                <span>
                    @if($product->discount_price != null)
                    <h4 style="text-decoration: line-through; font-size: 16px; color: #aaaaaa">
                        Rp{{$product->price}}
                    </h4>                        
                    <h3 style="font-size: 28px;">
                        Rp{{$product->discount_price}}
                    </h3>                                                 
                    @else                                                
                    <h3 style="font-size: 28px;">
                        Rp{{$product->price}}
                    </h3>                        
                    @endif                    
                </span>
                <h5 style="color: #aaaaaa">Category: {{$product->category}}</h5>
                <p style="font-size: 20px;">
                    {{$product->description}}                    
                </p>
                
                <div class="buy">
                    @if($product->quantity > 0)
                        <p style="font-weight: bold;">Stock: {{$product->quantity}}</p>
                    @else
                        <p style="color: #A90011; font-weight: bold;">Product out of stock</p>
                    @endif                
                </div>

                <form action="{{url('add_cart', $product->id)}}" method="Post">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <input type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}" style="height: 50px; width: 90px;">                                                                            
                        </div>         
                        <div class="col-md-2">
                            <input type="submit" value="Add to Cart" style="border-radius: 24px;">
                        </div>                        
                    </div>
                </form>                
            </div>
        </div>

      <!-- footer start -->
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>                              
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