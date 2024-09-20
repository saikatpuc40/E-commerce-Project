<?php

namespace App\Http\Controllers;

use App\Models\newUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewUserController extends Controller
{

    public function addcatagory(Request $req)
    {
        $catagories = DB::table('catagories')->insert([
                    'catagory' => $req->catagoryName,
        ]);

        if($catagories)
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
        $catagory = DB::table('catagories')->paginate(10);
        return view('admin.newcatagory',['data'=>$catagory]);
    }

    public function getCatagory(string $id)
    {
        $catagory = DB::table('catagories')->where('id',$id)->get();
        return view('admin.catagory',['data'=>$catagory]);
    }

    
    public function fetchData(string $id)
    {
        $catagory = DB::table('catagories')->find($id);
        return view('admin.updatecatagory',['data'=>$catagory]);
    }

    public function updateCatagory(Request $req, string $id)
    {
        $catagory = DB::table('catagories')->where('id',$id)
            ->update([
            'catagory' => $req->catagoryName,
        ]);

        if($catagory)
        {
            echo '<h1>Data Updated successfully!</h1>';
        }
        else
        {
            echo '<h1>Error!</h1>';
        }
    }

    public function deleteCatagory(string $id)
    {
        $catagory = DB::table('catagories')->where('id',$id)->delete();
        if($catagory)
        {
            echo '<h1>Data deleted successfully!</h1>';
            return redirect()->route('view.catagory');
        }
        else
        {
            echo '<h1>Error!</h1>';
        }
    }
    
    

}