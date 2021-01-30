<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    function index(){
        $product = Product::all();
        return view('main.main',['products' => $product]);
    }
    function getlogin(){
    return view('auth.login');
    }
    function getregistration(){
        return view('auth.registration');
        }
        function postregistration(Request $request){
            $request->validate([
                'name' => 'required|min:4',
                'mail' => 'required|min:4',
                'password' => 'required|min:4',
            ]);
            $user = new User([
                'name' => $request->input('name'),
                'email' => $request->input('mail'),
                'password'=> Hash::make($request->input('password'))
            ]);
            $user->save();
            Auth::login($user);
            return redirect()->route('main')->with('successreg','Succesfully registration');
        }
        function postlogin(Request $request){
            $request->validate([
                'name' => 'required|min:4',
                'password' => 'required|min:4',
            ]);
            if (Auth::guard('web')->attempt(['name' => $request->input('name'), 'password' => $request->input('password')])) {
                return redirect()->route('main');
            }
            return redirect()->back()->with('wrong','Wrong password or username');
        }
        function logout(){
            Session::forget('cart');
            Auth::logout();
            return redirect()->route('main');
        }
}
