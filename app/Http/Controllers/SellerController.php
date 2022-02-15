<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function Index(){
        return view('seller.login');
    } // END METHOD


    public function Dashboard(){
        return view('seller.index');
    }// END METHOD


 public function Login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('seller')->attempt(['email' => $check['email'], 'password' => $check['password']  ])){
            return redirect()->route('seller.dashboard')->with('error','Seller Login Successfully');
        }else{
            return back()->with('error','Invaild Email Or Password');
        }

    } // end mehtod


    public function Logout(){

         Auth::guard('seller')->logout();
        return redirect()->route('seller_login_from')->with('error','Seller Logout Successfully');
    } // end mehtod


    public function Register(){
        return view('seller.register');
    }// end mehtod


    public function Create(Request $request){

        // dd($request->all());

        Seller::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);

         return redirect()->route('seller_login_from')->with('error','Seller Created Successfully');

    } // end mehtod

}
