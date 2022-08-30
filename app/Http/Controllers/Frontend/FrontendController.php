<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Billing;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $products = Product::orderBy('created_at', 'desc')->take(6)->get();
        $productCount = Cart::where('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get()->count();
        return view('frontend.home.index', [
            'categories' => $categories,
            'products' => $products,
            'productCount' => $productCount,
        ]);
    }

    public function addToCart(Request $request, $id)
    {
        $product = new Cart();
        if(auth()->check()){
            $product->user_id = auth()->user()->id;
        } else {
            $product->ip_address = $request->ip();
        }
        $product->product_id = $request->product_id;
        $product->price = $request->price;
        $product->qty = $request->qty ? $request->qty : 1;
        $product->save();
        return redirect()->back()->with('message', 'Product add to cart!');

    }

    public function cartProducts()
    {
        $productCount = Cart::where('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get()->count();
        $products = Cart::with('products')->where('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get();
        return view('frontend.cart.list', compact('productCount', 'products'));
    }

    public function removeCartProducts($id)
    {
        $product = Cart::find($id);
        $product->delete();
        return redirect()->back()->with('warning', 'Remove product from cart!');

    }

    public function registration()
    {
        $productCount = Cart::where('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get()->count();
        return view('auth.login', compact('productCount'));
    }

    public function shipping()
    {
        $productCount = Cart::where('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get()->count();
        $products = Cart::with('products')->where('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get();
        return view('frontend.cart.shipping', compact('productCount', 'products'));
    }

    public function shippingStore(Request $request)
    {

        
        $this->validate($request, [
            'phone' => 'required',
            'address_one' => 'required',
            'address_two' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'payment_type' => 'required',
        ]);

        $billing = new Billing();
        $billing->user_id = auth()->user()->id;
        $billing->phone = $request->phone;
        $billing->address_one = $request->address_one;
        $billing->address_two = $request->address_two;
        $billing->country = $request->country;
        $billing->city = $request->city;
        $billing->state = $request->state;
        $billing->zip = $request->zip;
        $billing->payment_type = $request->payment_type;
        $billing->save();

        if(!empty($billing))
        {
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->total_qty = $request->total_qty;
            $order->total_price = $request->total_price;
            $order->save();
        }

        foreach($request->product_id as $key => $product){
            $orderProducts = new OrderDetails();
            $orderProducts->order_id = $order->id;
            $orderProducts->product_id = $request->product_id[$key];
            $orderProducts->qty = $request->qty[$key];
            $orderProducts->price = $request->price[$key];
            $orderProducts->save();
        }

        //Order product delete
        $cartProducts = Cart::with('products')->where('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get();
        foreach($cartProducts as $cartProduct)
        {
            $cartProduct->delete();
        }

        return redirect('/')->with('message', 'Order has been submitted');
    }

    // Contact page
    public function contact()
    {
        $productCount = Cart::where('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get()->count();
        return view('frontend.components.contact', compact('productCount'));
    }

    //Vue js search componnets
    public function searchProduct(Request $request)
    {
        $getSearchProducts = Product::orderBy('id', 'desc')->where('name', 'LIKE', '%'.$request->search.'%')->get();
        return $getSearchProducts;
    }

    // Frontend login & Registration
    public function showLoginForm()
    {
        $productCount = Cart::where('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get()->count();
        return view('auth.login', compact('productCount'));
    }

}
