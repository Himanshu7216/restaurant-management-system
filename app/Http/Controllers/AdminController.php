<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Juice;
use App\Models\Book;
use App\Models\Order;


class AdminController extends Controller
{
    public function add_food(){
        return view('admin.add_food');
    }
    public function add_juice(){
        return view('admin.add_juice');
    }

    public function upload_food(Request $request){
        $data = new Food;

        $data->title = $request->title;
        $data->details = $request->details;
        $data->price = $request->price;

        $image = $request->img;
        $filename = time().'.'.$image->getClientOriginalExtension();
        $request->img->move('food_img',$filename);
        $data->image = $filename;

        $data->save();

        return redirect()->back();
    }
    public function upload_juice(Request $request){
        $data = new Juice;

        $data->title = $request -> title;
        $data->details = $request -> details;
        $data->price = $request -> price;

        $image= $request->img;
        $filename = time().'.'.$image->getClientOriginalExtension();
        $request->img->move('juice_img',$filename);
        $data->image = $filename;

        $data->save();

        return redirect()->back();
    }



    public function view_food(){
        $food_data=Food::all();
        return view('admin.show_food',compact('food_data'));
    }
    
    public function view_Juice(){
        $juice_data=Juice::all();
        return view('admin.show_juice',compact('juice_data'));
    }

    public function delete_food($id){
        $food_data=Food::find($id);
        $food_data->delete();
        return redirect()->back();
    }
    public function delete_juice($id){
        $juice_data=Juice::find($id);
        $juice_data->delete();
        return redirect()->back();
    }

    public function update_food($id){
        $food = Food::find($id);
        return view('admin.update_food',compact('food'));
    }
    public function update_juice($id){
        $juice = Juice::find($id);
        return view('admin.update_juice',compact('juice'));
    }

    public function edit_food(Request $request,$id){
        $food_data= Food::find($id);
        $food_data->title=$request->title;
        $food_data->details=$request->details;
        $food_data->price=$request->price;

        $image = $request->img;
        if($image){
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->img->move('food_img',$imagename);
            $food_data->image=$imagename;
        }

        $food_data->save();
        return redirect('view_food');
    }
    public function edit_juice(Request $request,$id){
        $juice_data= Juice::find($id);
        $juice_data->title=$request->title;
        $juice_data->details=$request->details;
        $juice_data->price=$request->price;

        $image = $request->img;
        if($image){
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->img->move('juice_img',$imagename);
            $juice_data->image=$imagename;
        }

        $juice_data->save();
        return redirect('view_juice');
    }

    public function orders(){
        $data=Order::all();
        return view('admin.order',compact('data'));
    }

    public function on_the_way($id){
        $data =Order::find($id);
        $data->delivery_status="On The Way";
        $data->save();
        return redirect()->back();
    }
    public function Delivered($id){
        $data=Order::find($id);
        $data->delivery_status="Delivered";
        $data->save();
        return redirect()->back();
    }
    public function Canceled($id){
        $data =Order::find($id);
        $data->delivery_status="Canceled";
        $data->save();
        return redirect()->back();
    }

    public function reservation(){
        $book=Book::all();
        return view('admin.reservation',compact('book'));
    }
    public function tables(){
        $food_data= Food::all();
        $juice_data= Juice::all();
        return view('admin.tables',compact('food_data','juice_data'));
    }
    public function charts(){
        return view('admin.charts');
    }
    
    public function table_foods($id){
        $item = Food::findOrFail($id);
        return view('admin.more', [
        'item' => $item,
        'type' => 'food'
        ]);
    }

    public function table_drinks($id){
        $item = Juice::findOrFail($id);
        return view('admin.more', [
        'item' => $item,
        'type' => 'drink'
        ]);
    }

}
