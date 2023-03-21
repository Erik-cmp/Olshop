<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <style>
        *{
            font-family: sans-serif;
        }
        span{
            font-weight: 400;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Order Details</h1>
    @foreach($order as $order)
    <hr>
    <h3>Customer ID         : <span>{{$order->user_id}}</span></h3>
    <h3>Customer Name       : <span>{{$order->name}}</span></h3>
    <h3>Customer Email      : <span>{{$order->email}}</span></h3>
    <h3>Customer Phone      : <span>{{$order->phone}}</span></h3>
    <h3>Customer Address    : <span>{{$order->name}}</span></h3>
    <h3>Product ID          : <span>{{$order->name}}</span></h3>
    <h3>Product Name        : <span>{{$order->product_title}}</span></h3>
    <h3>Product Price       : <span>{{$order->price}}</span></h3>
    <h3>Product Quantity    : <span>{{$order->quantity}}</span></h3>
    <h3>Payment Status      : <span>{{$order->payment_status}}</span></h3>
    <h3>Image               : </h3>
    <br>
    <img src="product/{{$order->image}}" style="max-height: 300px;">      
    <br>
    @endforeach  
</body>
</html>