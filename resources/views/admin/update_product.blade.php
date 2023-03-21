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
                <h2>Update Product</h2>

                <form action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data" class="form_add">
                    @csrf
                    <div class="div_design">
                        <label for="">Product Title</label>
                        <input type="text" name="title" placeholder="" class="input_color" style="border-radius: 6px;" required="" value="{{$product->title}}">
                    </div>
                    <div class="div_design">
                        <label for="">Product Description</label>
                        <input type="text" name="description" placeholder="" class="input_color" style="border-radius: 6px;" required="" value="{{$product->description}}">
                    </div>                
                    <div class="div_design">
                        <label for="">Product Price</label>
                        <input type="number" name="price" placeholder="" class="input_color" style="border-radius: 6px;" required="" value="{{$product->price}}">
                    </div>
                    <div class="div_design">
                        <label for="">Discount Price</label>
                        <input type="number" name="dis_price" placeholder="" class="input_color" style="border-radius: 6px;" value="{{$product->discount_price}}">
                    </div>                
                    <div class="div_design">
                        <label for="">Product Quantity</label>
                        <input type="number" name="quantity" min="0" placeholder="" class="input_color" style="border-radius: 6px;" required="" value="{{$product->quantity}}">
                    </div>                                
                    <div class="div_design">
                        <label for="">Product Category</label>
                        <select name="category" id="select" style="border-radius: 6px;" required="">
                            <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach                            
                        </select>                    
                    </div>                    
                    <div class="div_design">                        
                        <img src="/product/{{$product->image}}" style="max-height: 200px; width: auto;" alt="">
                    </div>
                    <div class="div_design">                        
                        <label for="">Change Image</label>
                        <input type="file" name="image" placeholder="" class="input_color" style="border-radius: 6px;">
                    </div>                                                
                    <div class="div_design">
                        <input type="submit" value="Update Product" class="btn btn-primary" style="width: 50%; margin-top: 40px; font-size: 20px;">
                    </div>
                </form>


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