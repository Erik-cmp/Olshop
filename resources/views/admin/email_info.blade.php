<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            display: flex;
            align-items: center;
            flex-direction: column;            
        }

        .div_center h2{
            font-size: 32px;
            padding-bottom: 32px;
        }        

        input[type="text"], input[type="number"], #select, input[type="file"]{
          background-color : #151515; 
        }        

        .form_add label{
            display: inline-block;
            width: 200px;
        }

        .form_add input, .form_add #select{
            width: 80%;
        }

        .form_add{
            background-color: #252525;
            width: 50%;
            padding: 40px;
            padding-right: 50px;
            padding-top: 50px;
            border-radius: 12px;
        }

        .div_design{
            padding-bottom: 15px;
            display: flex;
            justify-content: center;
            align-items: center;                        
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
                <h2>Send Email to <span style="font-weight: bold;">{{$order->email}}</span></h2>

                <form action="{{url('send_user_email', $order->id)}}" method="POST" class="form_add">
                    @csrf
                    <div class="div_design">
                        <label for="">Subject  :</label>
                        <input type="text" name="subject" class="input_color" style="border-radius: 6px;">
                    </div>                    
                    <div class="div_design">
                        <label for="">Greeting  :</label>
                        <input type="text" name="greeting" class="input_color" style="border-radius: 6px;">
                    </div>
                    <div class="div_design">
                        <label for="">First Line    :</label>
                        <input type="text" name="firstline" class="input_color" style="border-radius: 6px;">
                    </div>              
                    <div class="div_design">
                        <label for="">Body  :</label>
                        <input type="text" name="body" class="input_color" style="border-radius: 6px;">
                    </div>
                    <div class="div_design">
                        <label for="">Button Name   :</label>
                        <input type="text" name="button" class="input_color" style="border-radius: 6px;">
                    </div>                       
                    <div class="div_design">
                        <label for="">Url   :</label>
                        <input type="text" name="url" class="input_color" style="border-radius: 6px;">
                    </div>            
                    <div class="div_design">
                        <label for="">Closing   :</label>
                        <input type="text" name="closing" class="input_color" style="border-radius: 6px;">
                    </div>     
                    <div class="div_design">
                        <input type="submit" value="Send Email" class="btn btn-primary" style="width: 50%; margin-top: 40px; font-size: 20px;">
                    </div>                                                                  
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