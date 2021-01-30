<?php

namespace App\Http\Controllers;
use App\Product;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function uploadproducts(Request $request){
        $request->validate([
            'name'              =>  'required',
            'price'              =>  'required',
            'desc'              =>  'required',
            'quan'              =>  'required',
            'img'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = new Product([
            'name' => $request->input('name') ,
            'price' => $request->input('price'),
            'description'=> $request->input('desc'),
            'quantity' => $request->input('quan')
        ]);
        if($file = $request->file('img')){
            $name = $file->getClientOriginalName();
            if($file->move('images',$name)){
                $product->image = $name;
                $product->save();
                return redirect()->route('admin')->with('success','1 new product successfully uploaded');
            }
        }
        return redirect()->back();
    }
    function deleteprod($id){
        $product = DB::table('products')->where('id',$id)->delete();
        return redirect()->route('admin')->with('deleteprod','1 product successfully deleted');
    }
    function updateprod(Request $request){
        $id = $request->input('id');
        $updateproduct = Product::find($id);
        if(!empty($request->price)){
            $updateproduct->price = $request->price;
            $updateproduct->save();
            return redirect()->route('admin')->with('updateprod','1  product succesfully updated');
        }
        else if(!empty($request->quan)){
            $updateproduct->quantity = $request->quan;
            $updateproduct->save();
            return redirect()->route('admin')->with('updateprod','1  product succesfully updated');
        }
        else{
            return redirect()->route('admin');
        }

    }
}
