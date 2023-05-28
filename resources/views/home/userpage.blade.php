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
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">      
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')         
         <!-- end header section -->
         <!-- slider section -->
        @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
        @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
        @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
        @include('home.product')
      <!-- end product section -->

      <!-- footer start -->
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://html.design/"><strong>Pethaus .co</strong></a><br></p>
      </div>

      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
      </script>

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