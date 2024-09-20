<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function productform()
    {
        $catagory_data = DB::table('catagories')->get();
        return view('admin.addproduct',['data'=>$catagory_data]);
    }
    public function addproduct(Request $req)
    {
        $req->validate(
            [    
                 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],);
        $imageName = time().'.'.$req->image->extension();  
        $req->image->move(public_path('images'), $imageName);
        $product = DB::table('products')->insert([
                    'title' => $req->productTitle,
                    'description' => $req->productDescription,
                    'price' => $req->productPrice,
                    'discount_price' => $req->discountPrice,
                    'quantity' => $req->productQuantity,
                    'catagory' => $req->productCatagory,
                    'image' => $imageName,
        ]);

        if($product)
        {
            echo '<h1>Data Added successfully!</h1>';
            // return redirect()->route('displayform');
        }
        else
        {
            echo '<h1>Error!</h1>';
        }
    }

    public function index()
    {
        $product = DB::table('products')->get();
        return view('admin.newproduct',['data'=>$product]);
    }

    public function getProduct(string $id)
    {
        $product = DB::table('products')->where('id',$id)->get();
        return view('admin.product',['data'=>$product]);
    }

    public function fetchData(string $id)
    {
        $product = DB::table('products')->find($id);
        $catagory_data = DB::table('catagories')->get();
        return view('admin.updateproduct',['data'=>$product,'value'=>$catagory_data]);
    }

    public function updateProduct(Request $req, string $id)
    {
        $product= DB::table('products')->find($id);
        $imageName=$product->image;

        if($req->hasFile('image'))
        {
            $oldImage=public_path('images/'.$product->image);
            unlink($oldImage);
            $imageName = time().'.'.$req->image->extension();  
            $req->image->move(public_path('images'), $imageName);

        }

        $product = DB::table('products')->where('id',$id)
            ->update([
                    'title' => $req->productTitle,
                    'description' => $req->productDescription,
                    'price' => $req->productPrice,
                    'discount_price' => $req->discountPrice,
                    'quantity' => $req->productQuantity,
                    'catagory' => $req->productCatagory,
                    'image' => $imageName,
        ]);

        if($product)
        {
            echo '<h1>Data Updated successfully!</h1>';
        }
        else
        {
            echo '<h1>Error!</h1>';
        }
    }


    public function deleteProduct(string $id)
        {
        $product= DB::table('products')->find($id);
        $oldImage=public_path('images/'.$product->image);
        unlink($oldImage);
        $product = DB::table('products')->where('id',$id)->delete();
        if($product)
        {
            echo '<h1>Data deleted successfully!</h1>';
            //return redirect()->route('view.user');
        }
        else
        {
            echo '<h1>Error!</h1>';
        }
    }

    public function home(){
        return view('user.home');
    }


    


}
