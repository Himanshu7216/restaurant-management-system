<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Juice;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Book;


use Illuminate\support\Facades\Auth;
use Illuminate\support\Str;
class HomeController extends Controller
{   
    public function registerForm(){
        return view('auth.register');
    }
    public function logout(){
        return redirect('home.index');
    }

    public function register(Request $request){

        $user= new User;
        $user->name= $request->name;
        $user->email=$request->email;
        $user->phone= $request->phone;
        $user->address=$request->address;
        $user->password=$request->password;

        $user->save();
        return redirect('login');

        // redirect to login page
        return redirect()->route('login')->with('status', 'Registration successful! Please login.');
    }


    public function my_home(){
        $food_data= Food::all();
        $juice_data= Juice::all();
        return view('home.index',compact('food_data','juice_data'));
    }



    public function index(){

    if(Auth::id()){                             //check user login or not
        $usertype = Auth()->user()->usertype;   //check usertype

        if($usertype == 'user'){
            $food_data  = Food::all();
            $juice_data = Juice::all();

            return view('home.index', compact('food_data','juice_data'));
        }else{
            $total_user = User::where('usertype','=','user')->count();
            $total_food = Food::count();
            $total_juice= Juice::count();
            $total_order = Order::count();
            $total_deliverd = Order::where('delivery_status','=','Delivered')->count();

            return view('admin.index', compact(
                'total_user',
                'total_food',
                'total_juice',
                'total_order',
                'total_deliverd'
            ));
        }
    }
}



    public function add_cart(Request $request,$id){
        if(Auth::id()){  

            $food_data = Food::find($id);
            $juice_data = Juice::find($id);

            if($food_data){
                $cart_title   = $food_data->title;
                $cart_details = $food_data->details;
                $cart_price   = Str::remove('$', $food_data->price);
                $cart_image   = $food_data->image;
                $cart_quantity=$request->quantity;
            }elseif($juice_data){
                $cart_title   = $juice_data->title;
                $cart_details = $juice_data->details;
                $cart_price   = Str::remove('$', $juice_data->price);
                $cart_image   = $juice_data->image;
                $cart_quantity=$request->quantity;
            }else {
                return redirect()->back()->with('error', 'Item not found');
            }           


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


    public function book_table(Request $request){
        $data= new Book;
        $data->name=$request->name;
        $data->phone = $request->phone;
        $data->guest=$request->n_guest;
        $data->date = $request->date;
        $data->time = $request->time;

        $data->save();
        return redirect()->back();
    }
}
