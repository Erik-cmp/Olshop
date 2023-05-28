<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(9);
        return view('home.userpage', compact('product'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {
            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_user = user::all()->count();
            $order = order::all();

            $total_revenue = 0;

            foreach($order as $order)
            {
                $total_revenue += $order->price;
            }

            $total_delivered = order::where('delivery_status', '=', 'Delivered')->count();
            $total_delivering = order::where('delivery_status', '=', 'Delivering')->count();
            $total_processing = order::where('delivery_status', '=', 'Processing')->count();
            $total_cancelled = order::where('delivery_status', '=', 'Order Cancelled')->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_delivering', 'total_processing', 'total_cancelled'));
        }
        else
        {
            $product = Product::paginate(9);
            return view('home.userpage', compact('product'));
        }
    }

    public function product_details($id)
    {
        $product = product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $product = product::find($id);            

            $cart = new cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;

            if($product->discount_price != null)
            {
                $cart->price = $product->discount_price * $request->quantity;
            }
            else
            {
                $cart->price = $product->price * $request->quantity;
            }

            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }        
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id', '=', $userid)->get();
        
        foreach($data as $data)
        {
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;            
            $order->product_id = $data->product_id;
            $order->payment_status = 'Cash on delivery';
            $order->delivery_status = 'Processing';            
            $order->save();
                 
            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            
            $product = product::find($data->product_id);
            $product->quantity = $product->quantity - $data->quantity;        
            $product->save();  

            $cart->delete();
        }

        return redirect()->back()->with('message', 'Order successfully received!');
    }

    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "idr",
                "source" => $request->stripeToken,
                "description" => "Thank you for your purchase!" 
        ]);

        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id', '=', $userid)->get();
        
        foreach($data as $data)
        {
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;            
            $order->product_id = $data->product_id;
            $order->payment_status = 'Paid';
            $order->delivery_status = 'Processing';
            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);

            $product = product::find($data->product_id);                  
            $product->quantity = $product->quantity - $data->quantity;                    
            $product->save();            
                                    
            $cart->delete();
        }        
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }    

    public function show_order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $order = order::where('user_id', '=', $userid)->get();
            return view('home.order', compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order = order::find($id);
        $order->delivery_status = 'Order Cancelled';
        $order->save();

        return redirect()->back();
    }

    public function product_search(Request $request)
    {
        $search_text = $request->search;
        $product = product::where('title', 'LIKE', '%' . $search_text . '%')->paginate(9);

        return view('home.userpage', compact('product', 'search_text'));
    }
}
