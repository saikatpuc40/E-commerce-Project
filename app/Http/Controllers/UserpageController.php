<?php

namespace App\Http\Controllers;

use App\Models\userpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class UserpageController extends Controller
{

    public function userpage()
    {
        $product = DB::table('products')->paginate(4);
        return view('user.userpage', ['data' => $product]);
    }
    public function productDetails(string $id)
    {

        $product = DB::table('products')->where('id', $id)->get();
        return view('user.productdetails', ['data' => $product]);
    }

    public function add_cart(Request $req, string $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = DB::table('products')->where('id', $id)->first();
            $price = $product->discount_price != null ? $product->discount_price : $product->price;
            $cart = DB::table('cart')->insert([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
                'user_id' => $user->id,
                'product_title' => $product->title,
                'price' => $price * $req->quantity,
                'image' => $product->image,
                'product_id' => $product->id,
                'quantity' => $req->quantity,
            ]);

            if ($cart) {
                return redirect()->back();
            }


        } else {
            return redirect('login');

        }

    }


    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $carts = DB::table('cart')->where('user_id', $id)->get();
            return view('user.showcart', ['data' => $carts]);
        } else {
            return redirect('login');

        }


    }

    public function remove_cart(string $id)
    {
        $carts = DB::table('cart')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $id = Auth::user()->id;
        $carts = DB::table('cart')->where('user_id', $id)->get();
        $orderPlaced = false;
        foreach ($carts as $cart) {
            $order = DB::table('orders')->insert([
                'name' => $cart->name,
                'email' => $cart->email,
                'phone' => $cart->phone,
                'address' => $cart->address,
                'user_id' => $cart->user_id,
                'product_title' => $cart->product_title,
                'price' => $cart->price,
                'image' => $cart->image,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'delivery_status' => 'processing',
                'payment_status' => 'cash on delivery',
            ]);

            if ($order) {
                $orderPlaced = true;
                DB::table('cart')->where('id', $cart->id)->delete();
            }

        }
        if ($orderPlaced) {
            return redirect()->back()->with('success', 'Order placed successfully!');
        }





    }

    public function order_placed()
    {

        $order = DB::table('orders')->get();
        return view('admin.order', ['data' => $order]);
    }

    public function deliver($id)
    {

        $order = DB::table('orders')->where('id', $id)
            ->update([
                'delivery_status' => "delivered",
                'payment_status' => "paid",
            ]);
        if ($order) {
            return redirect()->back();
        }
    }


    public function searchdata(Request $req)
    {
        $searchText=$req->search;

        $order = DB::table('orders')
        ->where('name', 'Like', "%$searchText%")
        ->orwhere('email', 'Like', "%$searchText%")
        ->orwhere('phone', 'Like', "%$searchText%")
        ->orwhere('address', 'Like', "%$searchText%")
        ->orwhere('price', 'Like', "%$searchText%")
        ->orwhere('product_title', 'Like', "%$searchText%")
        ->orwhere('payment_status', 'Like', "%$searchText%")
        ->get();
        return view('admin.order', ['data' => $order]);
        

    }

    public function dashboard(){
        $product = DB::table('products')->count();
        $order = DB::table('orders')->count();
        $user = DB::table('users')->where('usertype', "0")->count();
        $revenue = DB::table('orders')->sum('price');
        $delivery = DB::table('orders')->where('delivery_status',"delivered")->count();
        $processing = DB::table('orders')->where('delivery_status',"processing")->count();
        // dd($processing);
        return view('admin.dashboard', ['productCount' => $product,'orderCount' => $order,'userCount' => $user,'revenueCount' => $revenue,'deliveryCount' => $delivery,'processingCount' => $processing,]);
    }


    public function show_order()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $order = DB::table('orders')->where('user_id', $id)->get();
            return view('user.showorder', ['data' => $order]);
        } else {
            return redirect('login');

        }


    }

    public function cancel_order(string $id)
    {
        $order = DB::table('orders')->where('id', $id)
            ->update([
                'delivery_status' => "You canceled the order",
            ]);
        if ($order) {
            return redirect()->back();
        }
    }

    public function my_order()
    {
        if(Auth::id()){
            $id = Auth::user()->id;
            $order =DB::table("orders")
            ->where("user_id", $id)
            ->whereIn("delivery_status",['delivered','processing'])
            ->get();
            return view('user.myorder',['data'=>$order]);
        }

    }

    public function print_pdf($id){
        $order = DB::table('orders')->where('id', $id)->get();
        $pdf=PDF::loadView('admin.pdf',['data'=>$order]);
        return $pdf->download('order_details.pdf');
  }
  public function product_search(Request $req)
    {
        $searchText=$req->search;

        $product = DB::table('products')
        ->where('title', 'Like', "%$searchText%")
        ->paginate(3);
        return view('user.userpage', ['data' => $product]);
        

    }


  

}