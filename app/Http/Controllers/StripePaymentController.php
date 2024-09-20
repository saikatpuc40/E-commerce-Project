<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use Stripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StripePaymentController extends Controller
{
    public function stripe($Total_Price)

    {

        return view('admin.stripe',['Total_Price'=>$Total_Price]);

    }
    public function stripePost(Request $request,$Total_Price)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
             
        $charge =Stripe\Charge::create([

            "amount" => $Total_Price * 100,

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Test payment from itsolutionstuff.com."

        ]);

        $transactionId = $charge->id;


        if (Auth::id()) {
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
                'payment_status' => 'paid',
                'transaction_id' => $transactionId,
            ]);

            if ($order) {
                $orderPlaced = true;
                DB::table('cart')->where('id', $cart->id)->delete();
            }

        }



        Session::flash('success', 'Payment successful!');



        return back();
    }
}
}
