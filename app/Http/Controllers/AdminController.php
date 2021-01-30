<?php

namespace App\Http\Controllers;
use App\User;
use App\Admin;
use App\Product;
use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    function adminlogin(Request $request){
        $request->validate([
            'name' => 'required|min:4',
            'password' => 'required|min:4',
        ]);
        if (Auth::guard('admin')->attempt(['name' => $request->input('name'), 'password' => $request->input('password')])) {
            return redirect()->route('admin');
        }
        return redirect()->back()->with('wrong','Wrong password or username');
    }
    function admin(){
        $user = User::all();
        $product = Product::all();
        $max =Card::all()->max('payment_amount');
        $topprice = DB::table('cards')->select('name','payment_amount')->where('payment_amount','=',$max)->first();
        $amounts =DB::table('cards')
        ->select(array(DB::Raw('sum(payment_amount) as total')))
        ->groupBy(DB::Raw('DATE(created_at)'))
        ->get();
        $days =DB::table('cards')
        ->select(array(DB::Raw('DATE(created_at) day')))
        ->groupBy('day')
        ->get();
        $login = true;
        return view('admin.admin',['users' => $user,'login' => $login,'products' => $product,'topprice' => $topprice,'amounts' => $amounts,'days'=> $days]);
    }
    function getadminlogin(){
        return view('auth.adminlogin');
    }
    function deleteuser($id){
        $user = DB::table('users')->where('id',$id)->delete();
        return redirect()->route('admin')->with('deleteuser','1 user successfully deleted');
    }
    function adminlogout(){
        $login = false;
        return redirect()->route('main');
    }
    function updateuser(Request $request){
        $id = $request->input('id');
        $updateuser = User::find($id);
        if(!empty($request->name)){
            $updateuser->name = $request->name;
            $updateuser->save();
            return redirect()->route('admin');
        }
        else if(!empty($request->password)){
            $updateuser->password = Hash::make($request->password);
            $updateuser->save();
            return redirect()->route('admin')->with('updateuser','1 user successfully updated');
        }
        else if(!empty($request->mail)){
            $updateuser->email = $request->mail;
            $updateuser->save();
            return redirect()->route('admin')->with('updateuser','1 user successfully updated');
        }
        else{
            return redirect()->route('admin');
        }

    }
}
