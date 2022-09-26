<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Mail\Voucher;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $caro = Product::all();

        $search = '%' . $request->search . '%';
        $products = Product::where('name', 'LIKE', $search)->orWhere('category', 'LIKE', $search)->orderBy('id', 'desc')->get();
        return view('product', compact('caro', 'products'));
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('product-detail', compact('product'));
    }

    public function addtoCart(Request $request)
    {
        if ($request->session()->has('user')) {

            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->save();
            return redirect()->route('product');
        } else {
            return redirect()->route('login');
        }
    }

    public static function itemCount()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    public function cartList()
    {
        $userId = Session::get('user')['id'];

        $products = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->select('products.*', 'carts.id as cart_id')
            ->get();

        return view('cartList', compact('products'));
    }

    public function productDel($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('cartList');
    }

    public function orderNow()
    {
        $userId = Session::get('user')['id'];

        $products = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->select('products.*')
            ->get();

        return view('order-now', compact('products'));
    }
    public function orderPlace(Request $request)
    {
        $userId = Session::get('user')['id'];
        $userName = Session::get('user')['name'];
        $email = Session::get('user')['email'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {

            $order = new Order();
            $order->user_id = $cart->user_id;
            $order->product_id = $cart->product_id;
            $order->status = "Pending";
            $order->payment_method = $request->payment;
            $order->payment_status = "Pending";
            $order->address = $request->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }

        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();
        Mail::to($email)->send(new Voucher($userName, $orders));

        return redirect()->route('product')->with('message', 'Your Order Submitted Success');
    }

    public function myOrder()
    {
        $userId = Session::get('user')['id'];

        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();

        return view('my-order', compact('orders'));
    }
}
