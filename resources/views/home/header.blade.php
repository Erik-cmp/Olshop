<header class="header_section" style="box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16); position: fixed; width: 100%; background-color: #fff; z-index: 69; height: 100px;">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="64" src="images/logo2.svg" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item {{ $activePage === 'home' ? 'active' : '' }}">
                           <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ $activePage === 'cart' ? 'active' : '' }}">
                           <a class="nav-link" href="{{ url('show_cart') }}">Cart</a>
                        </li>
                        <li class="nav-item {{ $activePage === 'order' ? 'active' : '' }}">
                           <a class="nav-link" href="{{ url('show_order') }}">Order</a>
                        </li>                                                
                        @if (Route::has('login'))                        

                        @auth                        
                        <li class="nav-item">
                           <x-app-layout>
                           </x-app-layout>
                        </li>                                 
                        @else
                        <li class="nav-item" style="margin-right: 20px;">
                           <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>    
                        <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        @endif                                            
                     </ul>
                  </div>
               </nav>
            </div>
         </header>