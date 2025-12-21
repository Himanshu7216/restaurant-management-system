<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Auth;

class HomeController extends Controller
{
    public function my_home(){
        return view('home.index');
    }
    public function index(){

        if(Auth::id()){     //check user login or not
            $usertype=Auth()->user()->usertype; //check usertype
            if($usertype=='user'){
                return view('home.index');
            }else{
                return view('admin.index');
            }
        }
    }
}
