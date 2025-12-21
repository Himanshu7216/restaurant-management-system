<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;

use Illuminate\support\Facades\Auth;

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
}
