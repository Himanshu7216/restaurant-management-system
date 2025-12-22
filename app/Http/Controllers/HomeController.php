<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;


use Illuminate\support\Facades\Auth;
use Illuminate\support\Str;
class HomeController extends Controller
{
    public function my_home(){
        $data= Food::all();
        return view('home.index',compact('data'));
    }
    public function index(){

        if(Auth::id()){     //check user login or not
            $usertype=Auth()->user()->usertype; //check usertype
            if($usertype=='user'){
                $data =Food::all();
                return view('home.index',compact('data'));
            }else{
                return view('admin.index');
            }
        }
    }
    public function add_cart(Request $request,$id){
        if(Auth::id()){             //check user id exist or not
            $food=Food::find($id);  
            $cart_title=$food->title;
            $cart_details=$food->details;
            $cart_price=Str::remove('$',$food->price);
            $cart_image=$food->image;
            $cart_quantity=$request->quantity;

            $data= new Cart;
            $data->title=$cart_title;
            $data->details=$cart_details;
            $data->price=$cart_price * $cart_quantity;
            $data->image=$cart_image;
            $data->quantity=$cart_quantity;
            $data->userid = Auth()->user()->id;
            
            $data->save();
            return redirect()->back();
            
        }else{
            return redirect('login');
        }
    }

    public function my_cart(){
        $user_id=Auth::user()->id;

        $data=Cart::where('userid','=',$user_id)->get();
        return view('home.my_cart',compact('data'));
    }
    public function remove_cart($id){
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function confirm_order(Request $request){
        $user_id = Auth()->user()->id;                      //get user id if user logged in
        $cart = Cart::where('userid','=',$user_id)->get();   //get all data to match these user id

        foreach($cart as $cart){
            $order = new Order;
            $order->name=$request->name;
            $order->email=$request->email;
            $order->phone= $request->phone;
            $order->address=$request->address;

            $order->title=$cart->title;
            $order->quantity=$cart->quantity;
            $order->price=$cart->price;
            $order->image=$cart->image;

            $order->save();

            $data=Cart::find($cart->id);
            $data->delete();
            
        }
        
        return redirect()->back();

    }
}
